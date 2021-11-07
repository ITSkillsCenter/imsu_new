<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCurrentSemesterRunningsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('current__semester__runnings', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('title');
			$table->text('from');
			$table->text('to');
			$table->text('status');
			$table->string('previous_semester')->default('0 ');
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
		Schema::drop('current__semester__runnings');
	}

}
