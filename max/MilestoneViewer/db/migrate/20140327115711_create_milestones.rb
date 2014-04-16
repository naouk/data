class CreateMilestones < ActiveRecord::Migration
  def change
    create_table :milestones do |t|
      t.text :name
      t.integer :project_id
      t.date :planned_date
      t.date :target_date
      t.date :actual_date
      t.text :data_quality
      t.text :is_start_milestone
      t.text :is_certification_milestone
      t.text :is_completed_milestone

      t.timestamps
    end
  end
end
