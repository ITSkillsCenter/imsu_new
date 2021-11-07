<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeeHistoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fee_histories', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('fee_id', 191);
			$table->string('amount', 191);
			$table->string('student_id', 191);
			$table->string('session_id', 191);
			$table->string('semester', 191)->nullable();
			$table->string('is_applicable_discount', 191);
			$table->integer('discount')->nullable();
			$table->string('reason', 191)->nullable();
			$table->string('status', 191);
			$table->string('receipt', 225)->nullable();
			$table->date('due_date')->nullable();
			$table->string('payment_type', 191)->nullable();
			$table->string('reference_id', 191)->nullable();
			$table->string('invoice_id', 225)->nullable();
			$table->string('department_id', 191)->nullable();
			$table->timestamps();
			$table->string('payment_channel', 256)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fee_histories');
	}

}
