<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLedgersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ledgers', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('chart_account_id', 191);
			$table->string('student_id', 191)->nullable();
			$table->date('date');
			$table->string('particular', 191);
			$table->integer('amount');
			$table->string('account_type', 191);
			$table->string('receivable_id', 191)->nullable();
			$table->string('rd_id', 191)->nullable();
			$table->string('fee_list_id', 191)->nullable();
			$table->string('fee_id', 191)->nullable();
			$table->text('remarks', 65535)->nullable();
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
		Schema::drop('ledgers');
	}

}
