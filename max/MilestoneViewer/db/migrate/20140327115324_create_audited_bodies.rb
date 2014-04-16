class CreateAuditedBodies < ActiveRecord::Migration
  def change
    create_table :audited_bodies do |t|
      t.text :name

      t.timestamps
    end
  end
end
