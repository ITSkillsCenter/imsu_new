<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCroutinesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('croutines', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('course_code', 191);
			$table->string('faculty', 191);
			$table->string('time', 191);
			$table->string('class_room', 191);
			$table->string('day_of_week', 191);
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
		Schema::drop('croutines');
	}

}
