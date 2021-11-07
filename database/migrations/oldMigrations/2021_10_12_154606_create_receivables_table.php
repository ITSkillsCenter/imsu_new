<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReceivablesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('receivables', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('student_id', 191);
			$table->string('registration_id', 191)->unique('registration_id');
			$table->string('total', 191);
			$table->string('less', 191)->nullable();
			$table->string('paid', 191)->nullable();
			$table->string('due', 191)->nullable();
			$table->string('previous_due', 191)->nullable();
			$table->string('remarks', 191)->nullable();
			$table->boolean('status')->default(0);
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
		Schema::drop('receivables');
	}

}
