<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentCertificatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('student_certificates', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('student_id', 191);
			$table->string('ssc_c', 191)->nullable();
			$table->string('ssc_m', 191)->nullable();
			$table->string('hsc_c', 191)->nullable();
			$table->string('hsc_m', 191)->nullable();
			$table->string('cc', 191)->nullable();
			$table->string('bc', 191)->nullable();
			$table->string('ff', 191)->nullable();
			$table->string('tc', 191)->nullable();
			$table->string('mfc', 191)->nullable();
			$table->string('blc', 191)->nullable();
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
		Schema::drop('student_certificates');
	}

}
