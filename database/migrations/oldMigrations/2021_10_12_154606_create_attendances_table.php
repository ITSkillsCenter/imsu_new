<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttendancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attendances', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('date');
			$table->integer('subject_id')->unsigned();
			$table->integer('students_id')->unsigned();
			$table->string('department_id', 191);
			$table->string('semester', 191);
			$table->boolean('present')->default(0);
			$table->string('faculty_id', 191)->nullable();
			$table->string('ip', 191)->nullable();
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
		Schema::drop('attendances');
	}

}
