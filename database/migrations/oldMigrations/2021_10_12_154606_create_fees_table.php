<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fees', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('fee_name', 191);
			$table->string('account_type', 191);
			$table->integer('chart_account_id')->nullable();
			$table->string('section', 191)->nullable();
			$table->string('status', 191);
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
		Schema::drop('fees');
	}

}
