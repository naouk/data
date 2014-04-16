class StaticController < ApplicationController

  def home_page
  
    #@projects = Project.all
    #@milestones = Milestone.all
  end

  def milestones_by_audited_body
    
    @audited_bodies = AuditedBody.all

    if params[:audited_body_id]
      
      @audited_body = AuditedBody.find(params[:audited_body_id])
      
    end
  end

end