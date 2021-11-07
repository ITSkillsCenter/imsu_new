<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSyllabusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('syllabus', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('course_id')->unsigned();
			$table->bigInteger('session_id')->unsigned();
			$table->string('department_id');
			$table->string('level_term');
			$table->string('status');
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
		Schema::drop('syllabus');
	}

}
