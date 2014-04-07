require 'csv'
require 'json'
require 'httparty'

csv_data = CSV.read 'data/RailTravel.csv'
headers = csv_data.shift.map {|i| i.to_s }
string_data = csv_data.map {|row| row.map {|cell| cell.to_s } }
array_of_hashes = string_data.map {|row| Hash[*headers.zip(row).flatten] }
array_of_location_strings = []
array_of_hashes.each do |request|
  if request["From"] && request["To"]
    
    array_of_location_strings << request["From"] if !array_of_location_strings.include? request["From"] 
    array_of_location_strings << request["To"] if !array_of_location_strings.include? request["To"] 
  end
end 

File.open("data/location_strings.json", "w") do |file|
  file.puts JSON.pretty_generate(array_of_location_strings)
end

# File.open("data/air_travel.json", "w") do |file|
#   file.puts JSON.pretty_generate(array_of_hashes)
# end