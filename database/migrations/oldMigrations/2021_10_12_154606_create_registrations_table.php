<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegistrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registrations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('semester', 191);
			$table->string('levelTerm', 191);
			$table->string('student_id', 191);
			$table->string('reg_type', 191);
			$table->string('department', 191)->nullable();
			$table->boolean('dept_clearance')->default(0);
			$table->string('reg_approved', 191)->nullable();
			$table->boolean('hostel_clearance')->default(0);
			$table->boolean('account_clearance')->default(0);
			$table->boolean('transport')->nullable()->default(0);
			$table->boolean('library')->default(0);
			$table->string('dept_approved', 191)->nullable();
			$table->string('hostel_approved', 191)->nullable();
			$table->string('account_approved', 191)->nullable();
			$table->text('tb_remarks', 65535)->nullable();
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
		Schema::drop('registrations');
	}

}
