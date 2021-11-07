<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResultsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('results', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('student_id', 191)->unique();
			$table->string('name', 191)->nullable();
			$table->string('department', 191)->nullable();
			$table->string('enroll_semester', 191)->nullable();
			$table->string('passing_semester', 191)->nullable();
			$table->string('cgpa', 191)->nullable();
			$table->string('credit', 191)->nullable();
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
		Schema::drop('results');
	}

}
