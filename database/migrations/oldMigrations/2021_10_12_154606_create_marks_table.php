<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMarksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('marks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('Registration_Number', 191);
			$table->integer('course_id')->unsigned()->nullable();
			$table->string('grade_letter', 191);
			$table->string('grade_point', 191);
			$table->string('course_credit', 191);
			$table->string('level', 191)->nullable();
			$table->string('semester', 191)->nullable();
			$table->string('academic_year', 191)->nullable();
			$table->string('course_status', 191)->nullable();
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
		Schema::drop('marks');
	}

}
