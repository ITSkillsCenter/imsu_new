<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUnionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('unions', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('upazilla_id')->index('upazilla_id');
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
		Schema::drop('unions');
	}

}
