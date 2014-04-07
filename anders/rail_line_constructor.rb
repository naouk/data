require 'csv'
require 'json'
require 'httparty'

csv_data = CSV.read 'data/RailTravel.csv'
headers = csv_data.shift.map {|i| i.to_s }
string_data = csv_data.map {|row| row.map {|cell| cell.to_s } }
array_of_hashes = string_data.map {|row| Hash[*headers.zip(row).flatten] }
json_locations = []

File.open( 'data/mapped_locations.json', "r" ) do |f|
  json_locations = JSON.load( f );
  # building journeys by date
  locations = []
  array_of_hashes.each do |request|
    if request["Distance (miles)"] && request["Date of Travel"]
      from = json_locations.select {|location| location["name"] == request["From"] }
      to = json_locations.select {|location| location["name"] == request["To"] }
      if from.first && to.first
        hash = { 
          distance: request["Distance (miles)"], 
          date: request["Date of Travel"],
          from_lat: from.first["lat"],
          from_lng: from.first["lng"],
          to_lat: to.first["lat"],
          to_lng: to.first["lng"],
        }
        locations << hash
      end
    end
  end

  grouped_by_date = locations.group_by { |location| location[:date] }

  timestamped = []

  grouped_by_date.each do |date, group|
    stripped = date.dup.split ' 00:00'
    unix = Time.parse(stripped[0]).to_i
    timestamped << { unix: unix, date: date, group: group }
  end

  File.open("data/rail_locations_timestamped.json", "w") do |file|
    file.puts JSON.pretty_generate timestamped.sort_by { |l| l[:unix] }
  end
end