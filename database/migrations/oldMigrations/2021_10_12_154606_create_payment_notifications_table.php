<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment_notifications', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('invoice_no', 191)->nullable();
			$table->string('tranx_ref', 191)->nullable();
			$table->string('amount', 50)->nullable();
			$table->string('client_ref', 191)->nullable();
			$table->string('status', 50)->nullable();
			$table->string('statusCode', 50)->nullable();
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
		Schema::drop('payment_notifications');
	}

}
