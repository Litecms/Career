<?php

use Illuminate\Database\Migrations\Migration;

class CreateCareersTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: jobs
         */
        Schema::create('career_jobs', function ($table) {
            $table->increments('id');
            $table->string('title', 50)->nullable();
            $table->string('job_type', 250)->nullable();
            $table->string('location', 250)->nullable();
            $table->text('details')->nullable();
            $table->text('image')->nullable();
            $table->string('slug', 200)->nullable();
            $table->enum('published', ['Yes', 'No'])->default('No')->nullable();
            $table->enum('status', ['draft', 'published', 'hidden', 'suspended', 'spam'])->default('draft')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('upload_folder', 100)->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
        });
        /*
         * Table: resumes
         */
        Schema::create('career_resumes', function ($table) {
            $table->increments('id');
            $table->string('name', 250)->nullable();
            $table->text('email_id')->nullable();
            $table->string('mobile', 24)->nullable();
            $table->text('message')->nullable();
            $table->text('resume')->nullable();
            $table->text('image')->nullable();
            $table->integer('job_id')->nullable();
            $table->string('slug', 200)->nullable();
            $table->enum('published', ['Yes', 'No'])->default('No')->nullable();
            $table->enum('status', ['draft', 'published', 'hidden', 'suspended', 'spam'])->default('draft')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('upload_folder', 100)->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
        });
    }

    /*
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::drop('career_jobs');
        Schema::drop('career_resumes');
    }
}
