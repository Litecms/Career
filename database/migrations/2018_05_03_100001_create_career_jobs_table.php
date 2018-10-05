<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateCareerJobsTable extends Migration
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
        Schema::create(config('litecms.career.job.model.table'), function ($table) {
            $table->increments('id');
            $table->string('title', 255)->nullable();
            $table->string('company', 255)->nullable();
            $table->string('job_type', 255)->nullable();
            $table->string('location', 255)->nullable();
            $table->string('salary', 255)->nullable();
            $table->text('details')->nullable();
            $table->text('responsibilities')->nullable();
            $table->text('qualifications')->nullable();
            $table->text('image')->nullable();
            $table->string('slug', 255)->nullable();
            $table->enum('published', ['Yes', 'No'])->nullable();
            $table->enum('status', ['Show', 'Hide'])->nullable();
            $table->date('last_date')->nullable();
            $table->string('user_type', 255)->nullable();
            $table->integer('user_id')->nullable();

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
        Schema::drop(config('litecms.career.job.model.table'));
    }
}
