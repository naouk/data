require 'csv'
require 'json'
require 'httparty'

File.open( 'data/_rail_locations.json', "r" ) do |f|
  groups = JSON.load( f )
  response = []
  groups.each do |date, group|
    group.map do |journey|      
      if journey["date"]
        date = journey["date"].split(" 00:00")[0]
        journey["date"] = date
        dmy = date.split("/")
        journey["day"] = dmy[0]
        journey["month"] = dmy[1]
        journey["year"] = dmy[2]
        journey["month_year"] = "#{dmy[1]} #{smy[2]}"
      end
    end
    response += group
  end
  File.open("data/rail_locations_by_month_years.json", "w") do |file|
    file.puts JSON.pretty_generate response.group_by { |item| item["month_year"]} 
  end
end



# File.open("data/air_travel.json", "w") do |file|
#   file.puts JSON.pretty_generate(array_of_hashes)
# end