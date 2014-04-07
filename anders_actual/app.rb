require 'sinatra'
require 'json'
require 'net/http'
require 'uri'
require 'pry'
require 'csv'

helpers do
  def get_air_json
    File.open( "data/flight_dates.json", "r" ) do |f|
      JSON.load( f )
    end
  end
  def get_rail_json
    File.open( "data/rail_locations_timestamped.json", "r" ) do |f|
      JSON.load( f )
    end
  end
  def get_distance
    File.open( "data/distance_travelled_rail.json", "r" ) do |f|
      JSON.load( f )
    end
  end

end



#file routing

get '/style.css' do
  send_file 'style.css'
end

get '/nvd3.js' do
  send_file 'nv.d3.min.js'
end

get '/d3.js' do
  send_file 'd3.js'
end

get '/ol.js' do
  send_file 'ol.js'
end

get '/theme/default/style.css' do
  send_file 'ol.css'
end


#home
get '/air' do
  erb :air_travel, locals: { json: get_air_json.to_json }
end
get '/distance' do
  erb :distance_travelled, locals: { json: get_distance.to_json }
end
get '/rail' do
  erb :rail_travel2, locals: { json: get_rail_json.to_json }
end

