require 'csv'

class DataParser

  def initialize
    puts 'we are in initialize' 
  end

  def populate_db

    a = AuditedBody.new
    p = Project.new
    project_name = ''

    # Name of thing,  r[0]
    # Milestone Actual Date, r[1]
    # Milestone Planned Date, r[2]
    # Milestone Target Date, r[3]
    # Data Quality, r[4]
    # Is Start Milestone, r[5]
    # Is Certification Milestone, r[6]
    # Is Completed Milestone, r[7]
    # Product Milestone Actual Duration - Work Days r[8]

    CSV.foreach("public/ProductMilestoneDates.csv") do |r|

      #If there's no dates, we're in an 'audited body', so lets make it.
      if r[1].nil? && r[2].nil? && r[3].nil?
        
        r[0] = '' if r[0].nil? #If it's nil (i.e. there's no product name), just put an empty string.

        a = AuditedBody.create(name: r[0].strip)

      # If not, we're in a milestone, let's add them to the current audited body.
      else
        
        puts 'we are in a milestone'
        puts 'the project is'

        r[0] = '' if r[0].nil?
        r[1] = '' if r[1].nil?
        r[2] = '' if r[2].nil?
        r[3] = '' if r[3].nil?
        r[4] = '' if r[4].nil?

        first, *rest = r[0].split(' - ')
        project_name = first

        p = a.projects.create(name: project_name, total_work_days: r[8]) unless p.name == project_name

        milestone_name = ''
        rest.each { |s| milestone_name = milestone_name + s.to_s.gsub(/\n/, "").gsub(/\r/, "") }
        
        p.milestones.create(name: milestone_name,
          actual_date: r[1],
          planned_date: r[2],
          target_date: r[3],
          data_quality: r[4],
          is_start_milestone: r[5],
          is_certification_milestone: r[6],
          is_completed_milestone: r[7]
        )

      end
    end
  end

end