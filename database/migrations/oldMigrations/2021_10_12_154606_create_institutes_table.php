<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInstitutesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('institutes', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 250);
			$table->string('establish', 10);
			$table->string('email', 100);
			$table->string('web', 80);
			$table->string('phoneNo', 15);
			$table->string('address', 250);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('institutes');
	}

}
