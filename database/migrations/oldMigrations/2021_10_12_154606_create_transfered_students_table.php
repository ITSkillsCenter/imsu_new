<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransferedStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transfered_students', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('student_id', 191);
			$table->string('university_name', 191);
			$table->string('start_semester', 191)->nullable();
			$table->string('end_semester', 191)->nullable();
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
		Schema::drop('transfered_students');
	}

}
