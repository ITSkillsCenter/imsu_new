<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOtpsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('otps', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('identifier', 191);
			$table->string('token', 191);
			$table->integer('validity')->default(5);
			$table->boolean('valid')->default(1);
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
		Schema::drop('otps');
	}

}
