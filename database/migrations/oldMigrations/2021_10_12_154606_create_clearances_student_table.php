<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClearancesStudentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clearances_student', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('student_id', 191);
			$table->boolean('hostel')->default(0);
			$table->boolean('transport')->default(0);
			$table->boolean('canteen')->default(0);
			$table->boolean('library')->default(0);
			$table->boolean('department')->default(0);
			$table->boolean('treasurer')->default(0);
			$table->text('tb_remarks', 65535)->nullable();
			$table->string('t_approved_name', 191)->nullable();
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
		Schema::drop('clearances_student');
	}

}
