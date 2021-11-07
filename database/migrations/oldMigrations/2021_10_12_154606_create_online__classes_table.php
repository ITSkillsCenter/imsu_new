<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOnlineClassesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('online__classes', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('faculty_id')->unsigned();
			$table->integer('course_id')->unsigned();
			$table->string('level_term', 191);
			$table->string('dept_id', 191);
			$table->string('class_for');
			$table->string('section');
			$table->string('session');
			$table->string('date_time', 191);
			$table->string('duration');
			$table->string('link', 191);
			$table->string('meeting_id', 191)->nullable();
			$table->string('meeting_password', 191)->nullable();
			$table->text('remarks')->nullable();
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
		Schema::drop('online__classes');
	}

}
