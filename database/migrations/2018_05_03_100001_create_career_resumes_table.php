<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateCareerResumesTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: resumes
         */
        Schema::create(config('litecms.career.resume.model.table'), function ($table) {
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->integer('mobile')->nullable();
            $table->string('message', 255)->nullable();
            $table->text('resume')->nullable();
            $table->text('image')->nullable();
            $table->integer('job_id')->nullable();
            $table->string('slug', 255)->nullable();
            $table->enum('published', ['Yes','No'])->nullable();
            $table->string('uploaded_folder', 255)->nullable();
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
        Schema::drop(config('litecms.career.resume.model.table'));
    }
}
