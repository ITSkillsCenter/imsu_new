<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWaivedCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('waived_courses', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('student_id', 191);
			$table->string('course_id', 191);
			$table->string('credit', 191);
			$table->string('grade_letter', 191);
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
		Schema::drop('waived_courses');
	}

}
