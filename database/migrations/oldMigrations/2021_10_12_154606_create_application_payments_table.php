<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApplicationPaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('application_payments', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('application_number', 50)->nullable();
			$table->string('name', 50)->nullable();
			$table->string('phone', 50)->nullable();
			$table->integer('amount')->nullable();
			$table->string('reference_id', 50)->nullable();
			$table->string('pms_id')->nullable();
			$table->string('status', 50)->nullable();
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
		Schema::drop('application_payments');
	}

}
