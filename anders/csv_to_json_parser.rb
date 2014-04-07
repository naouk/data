require 'csv'
require 'json'
require 'httparty'

csv_data = CSV.read 'data/AirTravel.csv'
headers = csv_data.shift.map {|i| i.to_s }
string_data = csv_data.map {|row| row.map {|cell| cell.to_s } }
array_of_hashes = string_data.map {|row| Hash[*headers.zip(row).flatten] }

def get_location name
  response = HTTParty.get("http://unlock.edina.ac.uk/ws/search?name=#{URI.encode(name)}&format=json")
  body = JSON.parse(response.body) if response
  first = body["features"].first if body
  properties = first["properties"] if first
  strings = properties["centroid"].split(", ") if properties
  strings.map {|coord| coord.to_s } if strings
end
# building journeys by date
journeys_by_date = []
array_of_hashes.each do |request|
  if request['Itinerary Details'] && request['Travel Date']
    request['Itinerary Details'].split(',').each do |string|
      rocket_split = string.split(' -> ')
      departure = rocket_split[0]
      arrival = rocket_split[1]
      response = {}
      response[:departure] = departure
      departure_location = get_location(departure)
      if(departure_location)
        response[:departure_lat] = departure_location[0]
        response[:departure_lng] = departure_location[1]
      end
      response[:arrival] = arrival
      arrival_location = get_location(arrival)
      if(arrival_location)
        response[:arrival_lat] = arrival_location[0]
        response[:arrival_lng] = arrival_location[1]
      end
      response[:date] = request['Travel Date']
      journeys_by_date << response if departure_location && arrival_location
    end
  end
end 

File.open("data/air_by_date.json", "w") do |file|
  file.puts JSON.pretty_generate(journeys_by_date)
end

# File.open("data/air_travel.json", "w") do |file|
#   file.puts JSON.pretty_generate(array_of_hashes)
# end