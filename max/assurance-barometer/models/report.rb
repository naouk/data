require 'csv'
require 'date'

class Report

  def initialize
    @results = {}
    @missed_planned_projects = []
    @missed_target_projects = []
    @moved_projects = []
    @completed_projects = []
    @number_of_moved_dates = 0
    @number_of_missed_planned = 0
    @number_of_missed_targets = 0
    @number_of_completed_projects = 0
    @total_projects = 0
    @year_start
    calculate_totals
  end
  
  def calculate_totals

    i = 0

    CSV.foreach('data/CertificationDatesByProject.csv') do |p|
      
      i = i+1
      next if i == 1

      project = p[0]
      actual_date = Date.parse(p[1]) unless p[1].nil? || p[1] == ''
      planned_date = Date.parse(p[2]) unless p[2].nil? || p[2] == ''
      target_date = Date.parse(p[3]) unless p[3].nil? || p[3] == ''
      p[4] = get_financial_year(project)
      p[5] = '' # start of the year
      p[6] = '' # missed plans
      p[7] = '' # missed targets
      p[8] = '' # days since year start

      unless target_date.nil? && planned_date.nil? && actual_date.nil? # Do we have any data at all?
        
        if planned_date && target_date && target_date != planned_date
          moved_project(p)
        end
        
        if actual_date && planned_date && actual_date > planned_date # This one missed it's planned date, do something
          p[6] = (actual_date - planned_date).to_i # How many days did it miss by?
          missed_planned_project(p) # Add it 
        end

        if actual_date && target_date && actual_date > target_date
          p[7] = (actual_date - target_date).to_i # How many days did it miss by?
          missed_target_project(p)
        end

        if actual_date # our project has finished!
          p[5] = get_start_of_financial_year(p[4])
          p[8] = (actual_date - p[5]).to_i
          completed_project(p)
        end

      end

    end

    @total_projects = i
    
  end

  def total_projects
    @total_projects
  end

  def number_of_moved_dates
    @number_of_moved_dates
  end

  def number_of_missed_planned
    @number_of_missed_planned
  end

  def number_of_missed_targets
    @number_of_missed_targets
  end

  def moved_project data
    @number_of_moved_dates = @number_of_moved_dates+1
    @moved_projects << data
  end

  def moved_projects
    @moved_projects
  end

  def missed_planned_project data
    @number_of_missed_planned = @number_of_missed_planned+1 #increment counter
    @missed_planned_projects << data
  end

  def missed_planned_projects
    @missed_planned_projects
  end

  def missed_target_project data
    @number_of_missed_targets = @number_of_missed_targets+1
    @missed_target_projects << data
  end

  def missed_target_projects
    @missed_target_projects
  end

  def completed_project data
    @number_of_completed_projects = @number_of_completed_projects+1
    @completed_projects << data
  end

  def completed_projects
    @completed_projects
  end

  def get_financial_year project_title
    project_title[-10,9]
  end

  def get_start_of_financial_year financial_year
    Date.parse("01/04/#{financial_year[5,4]}")
  end

end