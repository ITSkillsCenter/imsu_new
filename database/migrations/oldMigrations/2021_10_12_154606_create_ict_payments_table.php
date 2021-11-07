<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIctPaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ict_payments', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('student_id', 191);
			$table->string('reference_id', 191);
			$table->string('session_id', 191);
			$table->string('semester', 191)->nullable();
			$table->string('amount', 191);
			$table->text('reason', 65535)->nullable();
			$table->text('receipt', 65535)->nullable();
			$table->text('paid_via', 65535)->nullable();
			$table->string('status')->nullable();
			$table->date('date')->nullable();
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
		Schema::drop('ict_payments');
	}

}
