class AuditedBody < ActiveRecord::Base
  
  has_many :projects
  has_many :milestones, through: :projects

end
