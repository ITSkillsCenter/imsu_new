<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApplicantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('applicants', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('application_number')->unique('application_number');
			$table->string('password', 225)->nullable();
			$table->string('type')->nullable();
			$table->string('full_name')->nullable();
			$table->string('first_name')->nullable();
			$table->string('middle_name')->nullable();
			$table->string('last_name')->nullable();
			$table->string('email')->nullable();
			$table->string('phone_number')->nullable();
			$table->string('year')->nullable();
			$table->string('mode_of_admission', 225)->nullable();
			$table->string('jamb_score')->nullable();
			$table->string('jamb_subject1')->nullable();
			$table->string('score1')->nullable();
			$table->string('jamb_subject2')->nullable();
			$table->string('score2')->nullable();
			$table->string('jamb_subject3')->nullable();
			$table->string('score3')->nullable();
			$table->string('jamb_subject4')->nullable();
			$table->string('score4')->nullable();
			$table->string('exam_1')->nullable();
			$table->string('olevel_1')->nullable();
			$table->string('exam_2')->nullable();
			$table->string('olevel_2')->nullable();
			$table->string('sex')->nullable();
			$table->string('state')->nullable();
			$table->string('lga')->nullable();
			$table->string('course')->nullable();
			$table->string('date_of_birth')->nullable();
			$table->string('phone_number_alt')->nullable();
			$table->string('email_alt')->nullable();
			$table->string('next_of_kin')->nullable();
			$table->string('next_of_kin_phone')->nullable();
			$table->string('address')->nullable();
			$table->string('status')->nullable();
			$table->text('exams', 65535)->nullable();
			$table->text('exam_type', 65535)->nullable();
			$table->text('exam_type2', 65535)->nullable();
			$table->text('country2', 65535)->nullable();
			$table->text('state2', 65535)->nullable();
			$table->text('lga2', 65535)->nullable();
			$table->text('exam2', 65535)->nullable();
			$table->text('sponsor_name', 65535)->nullable();
			$table->text('sponsor_phone', 65535)->nullable();
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
		Schema::drop('applicants');
	}

}
