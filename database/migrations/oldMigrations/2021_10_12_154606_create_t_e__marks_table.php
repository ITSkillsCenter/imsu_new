<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTEMarksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_e__marks', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('evaluation_id');
			$table->integer('qs_category_id');
			$table->integer('qs_id');
			$table->integer('scale');
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
		Schema::drop('t_e__marks');
	}

}
