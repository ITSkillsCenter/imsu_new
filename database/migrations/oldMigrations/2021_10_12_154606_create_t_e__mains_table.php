<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTEMainsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_e__mains', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('student_id', 191);
			$table->string('department')->nullable();
			$table->string('semester_id', 191);
			$table->string('course_id', 191);
			$table->string('faculty_id', 191);
			$table->string('remarks', 191)->nullable();
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
		Schema::drop('t_e__mains');
	}

}
