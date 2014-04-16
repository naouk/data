class Project < ActiveRecord::Base

  belongs_to :audited_body
  has_many :milestones

  def project_start_date
    start_milestone.actual_date if start_milestone
  end

  def start_milestone
    milestones.where('is_start_milestone = ?', 'Y').first
  end

  def completed_milestone
    milestones.where('is_completed_milestone = ?', 'Y').first
  end

  def project_end_date
    completed_milestone.actual_date if completed_milestone
  end

end
