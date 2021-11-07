<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUpazilasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('upazilas', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('district_id')->index('district_id');
			$table->string('name', 25);
			$table->string('bn_name', 25);
			$table->string('url', 50);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('upazilas');
	}

}
