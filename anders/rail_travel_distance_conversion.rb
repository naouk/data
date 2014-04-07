require 'csv'
require 'json'
require 'httparty'
require 'time'

csv_data = CSV.read 'data/RailTravel.csv'
headers = csv_data.shift.map {|i| i.to_s }
string_data = csv_data.map {|row| row.map {|cell| cell.to_s } }
array_of_hashes = string_data.map {|row| Hash[*headers.zip(row).flatten] }


# building journeys by date
distance_travelled = []
array_of_hashes.each do |request|
  if request["Distance (miles)"] && request["Date of Travel"]
    distance_travelled << { distance: request["Distance (miles)"], date: request["Date of Travel"] }
  end
end
dates_totals = [];
distance_travelled.group_by { |element| element[:date] }.each do |date, group|
  if date != ""
    total = 0;
    stripped = date.dup.split ' 00:00'
    unix = Time.parse(stripped[0]).to_i
    group.each do |journey|
      total += journey[:distance].to_i
    end
    dates_totals << { date: date, total: total, unix: unix }
  end
end

File.open("data/distance_travelled_rail.json", "w") do |file|
  file.puts JSON.pretty_generate dates_totals.sort_by { |k| k[:unix] }
end

# File.open("data/air_travel.json", "w") do |file|
#   file.puts JSON.pretty_generate(array_of_hashes)
# end