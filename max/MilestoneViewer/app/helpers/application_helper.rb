module ApplicationHelper

  def date_for_timeline date
    return '' if date.nil?
    date = Date.parse(date.to_s)
    date.strftime("%Y,%m,%d")
  end

end
