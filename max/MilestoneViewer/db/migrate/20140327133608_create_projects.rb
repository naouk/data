class CreateProjects < ActiveRecord::Migration
  def change
    create_table :projects do |t|
      t.text :name
      t.belongs_to :audited_body
      t.belongs_to :milestone
      t.integer :total_work_days

      t.timestamps
    end
  end
end
