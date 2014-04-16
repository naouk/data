require 'sinatra'
require 'active_support'
require 'active_support/all'
require_relative 'models/report'

def number_with_delimiter number
  number.to_s.reverse.gsub(/(\d{3})(?=\d)/, '\\1,').reverse
end

get '/' do
  @report = Report.new
  erb :show_report
end