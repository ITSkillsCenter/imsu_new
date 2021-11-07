<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_student', function (Blueprint $table) {
            $table->increments('id');
            $table->string('semester');
            $table->string('levelTerm');
            $table->string('student_id');
            $table->string('course_id');
            $table->string('reg_type');
            $table->string('course_status')->nullable();
            $table->string('department')->nullable();
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
        Schema::dropIfExists('courses_student');
    }
}
