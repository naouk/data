require 'csv'
require 'json'
require 'httparty'

def get_coords url
    response = HTTParty.get(url)
  body = JSON.parse(response.body) if response
  first = body["features"].first if body
  properties = first["properties"] if first
  strings = properties["centroid"].split(", ") if properties
  strings.map {|coord| coord.to_s } if strings
end

File.open( 'data/location_strings.json', "r" ) do |f|
  location_strings = JSON.load( f );
  coords = location_strings.map do |string|
    response = get_coords("http://unlock.edina.ac.uk/ws/search?name=#{URI.encode(string)}&format=json")
    { name: string, lat: response[0], lng: response[1] } if response
  end
  File.open("data/mapped_locations.json", "w") do |file|
    file.puts JSON.pretty_generate coords
  end
end



# File.open("data/air_travel.json", "w") do |file|
#   file.puts JSON.pretty_generate(array_of_hashes)
# end