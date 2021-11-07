<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesStudentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses_student', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('session_id', 191);
			$table->string('semester', 191);
			$table->string('level', 191);
			$table->string('student_id', 191);
			$table->string('course_id', 191);
			$table->string('reg_type', 191)->nullable();
			$table->string('course_status', 191)->nullable();
			$table->string('department', 191)->nullable();
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
		Schema::drop('courses_student');
	}

}
