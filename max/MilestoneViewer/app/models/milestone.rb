class Milestone < ActiveRecord::Base

  belongs_to :project

  def has_actual_date
    
  end

end
