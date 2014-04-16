# encoding: UTF-8
# This file is auto-generated from the current state of the database. Instead
# of editing this file, please use the migrations feature of Active Record to
# incrementally modify your database, and then regenerate this schema definition.
#
# Note that this schema.rb definition is the authoritative source for your
# database schema. If you need to create the application database on another
# system, you should be using db:schema:load, not running all the migrations
# from scratch. The latter is a flawed and unsustainable approach (the more migrations
# you'll amass, the slower it'll run and the greater likelihood for issues).
#
# It's strongly recommended that you check this file into your version control system.

ActiveRecord::Schema.define(version: 20140327133608) do

  # These are extensions that must be enabled in order to support this database
  enable_extension "plpgsql"

  create_table "audited_bodies", force: true do |t|
    t.text     "name"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  create_table "milestones", force: true do |t|
    t.text     "name"
    t.integer  "project_id"
    t.date     "planned_date"
    t.date     "target_date"
    t.date     "actual_date"
    t.text     "data_quality"
    t.text     "is_start_milestone"
    t.text     "is_certification_milestone"
    t.text     "is_completed_milestone"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  create_table "projects", force: true do |t|
    t.text     "name"
    t.integer  "audited_body_id"
    t.integer  "milestone_id"
    t.integer  "total_work_days"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

end
