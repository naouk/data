object @timeline => :timeline
  node(:headline) { |n| "National Audit Office Project Milestones" }
  node(:type) { |n| "default" }
  node(:text) { |n| "<p>Welcome to our interactive view of all NAO milestones from the new data warehouse.</p>" }
  
  child( @milestones, {:root => 'date', :object_root => false} ) do |m|
    attributes :project_id => :text
      node(:text) { |m| m.name }
      node(:headline) { |m| m.project.name }
      node(:startDate) { |m| date_for_timeline(m.actual_date) }
      node(:endDate) { |m| date_for_timeline(m.actual_date) }
  end

  child( @projects, {:root => 'era', :object_root => false} ) do |p|
    attributes :name => :headline
      node(:startDate) { |p| date_for_timeline( p.project_start_date ) if p.project_start_date }
      node(:endDate) { |p| date_for_timeline( p.project_end_date ) if p.project_end_date }
  end


