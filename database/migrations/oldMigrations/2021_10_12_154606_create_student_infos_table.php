<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentInfosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('student_infos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('Enrollment_Semester', 191)->nullable();
			$table->string('registration_number', 191)->nullable()->unique('registration_number');
			$table->string('matric_number', 191)->nullable()->unique('matric_number');
			$table->string('password', 191);
			$table->string('temp_password', 191);
			$table->integer('faculty_id')->nullable();
			$table->integer('dept_id')->nullable();
			$table->integer('dept_option')->nullable();
			$table->string('student_type', 191)->nullable();
			$table->string('level', 191)->nullable();
			$table->string('student_group', 191)->nullable();
			$table->string('Full_Name', 191)->nullable();
			$table->string('first_name', 191);
			$table->string('middle_name', 191)->nullable();
			$table->string('last_name', 191)->nullable();
			$table->string('Batch', 191)->nullable();
			$table->string('Passing_Batch', 191)->nullable();
			$table->string('Program', 191)->nullable();
			$table->string('date_of_birth', 191)->nullable();
			$table->string('gender', 191)->nullable();
			$table->string('marital_status', 191)->nullable();
			$table->string('blood_group', 191)->nullable();
			$table->string('religion', 191)->nullable();
			$table->string('nationality', 191)->nullable();
			$table->string('fathers_name', 191)->nullable();
			$table->string('fathers_address', 191)->nullable();
			$table->string('fathers_phone')->nullable();
			$table->string('mothers_name', 191)->nullable();
			$table->string('mothers_address', 191)->nullable();
			$table->string('mothers_phone')->nullable();
			$table->string('Student_Mobile_Number', 191)->nullable();
			$table->string('Email_Address', 191)->nullable();
			$table->string('guardians_name', 191)->nullable();
			$table->string('guardians_phone', 191)->nullable();
			$table->text('guardians_address', 65535)->nullable();
			$table->string('guardians_relationship', 50)->nullable();
			$table->text('Permanent_Address', 65535)->nullable();
			$table->string('Photo', 191)->nullable()->default('Photo');
			$table->string('sponsors_name', 191)->nullable();
			$table->string('sponsors_address', 191)->nullable();
			$table->string('sponsors_phone', 191)->nullable();
			$table->string('sponsors_relationship', 191)->nullable();
			$table->string('Current_semester', 191)->nullable();
			$table->string('Current_status', 191)->nullable();
			$table->string('Payment_status', 191)->nullable()->default('unpaid');
			$table->string('lga', 191)->nullable();
			$table->string('state_of_origin', 191)->nullable();
			$table->text('medical_info', 65535)->nullable();
			$table->string('country_residence')->nullable();
			$table->string('state_of_residence')->nullable();
			$table->string('lga_of_residence')->nullable();
			$table->string('status')->nullable();
			$table->text('reason', 65535)->nullable();
			$table->string('otp', 225)->nullable();
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
		Schema::drop('student_infos');
	}

}
