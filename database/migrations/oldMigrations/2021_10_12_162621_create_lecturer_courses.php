<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturerCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturer_courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lecturer_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('course_id')->nullable();
            $table->string('department_id')->nullable();
            $table->string('faculty_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecturer_courses');
    }
}
