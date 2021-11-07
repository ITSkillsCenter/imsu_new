<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReceivableDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('receivable_details', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('student_id', 191);
			$table->date('date');
			$table->integer('fee_id');
			$table->string('particular', 191);
			$table->integer('amount');
			$table->string('account_type', 191);
			$table->string('section', 191);
			$table->string('receivable_id', 191)->nullable();
			$table->integer('is_semester')->default(0);
			$table->string('remarks', 191)->nullable();
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
		Schema::drop('receivable_details');
	}

}
