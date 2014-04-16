class MilestonesController < ActionController::Base

  def all_milestones
    @timeline = OpenStruct.new(headline: 'this is headline')
    @projects = Project.limit(100).select { |p| p.project_start_date.present? && p.project_end_date.present? }
    @audited_bodies = AuditedBody.all
    @milestones = []
    @projects.each do |p|
      @milestones_with_a_date = p.milestones.select { |m| m.actual_date.present? }
      puts @milestones_with_a_date.inspect
      @milestones = @milestones + @milestones_with_a_date
    end
  end

  def milestones_by_audited_body
    @audited_body = AuditedBody.find(params[:audited_body_id])
    @timeline = OpenStruct.new(headline: "Projects and Milestones for #{@audited_body.name}")
    @projects = @audited_body.projects.limit(100).select { |p| p.project_start_date.present? && p.project_end_date.present? }
    puts @projects
    @milestones = []
    @projects.each do |p|
      @milestones_with_a_date = p.milestones.select { |m| m.actual_date.present? }
      puts @milestones_with_a_date.inspect
      @milestones = @milestones + @milestones_with_a_date
    end
  end

end