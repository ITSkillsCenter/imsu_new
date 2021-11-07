<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Enrollment_Semester');
            $table->string('Registration_Number')->unique();
            $table->string('Full_Name');
            $table->string('Batch');
            $table->string('Program');
            $table->string('Date_of_Birth');
            $table->string('Gender');
            $table->string('Marital_Status')->nullable();
            $table->string('Blood_Group')->nullable();
            $table->string('Religion');
            $table->string('Nationality');
            $table->string('Fathers_Name')->nullable();
            $table->string('Fathers_Profession')->nullable();
            $table->string('Mothers_Name')->nullable();
            $table->string('Mothers_Profession')->nullable();
            $table->string('Student_Mobile_Number');
            $table->string('Email_Address')->nullable();
            $table->string('Password')->nullable();
            $table->string('Guardian_Name')->nullable();
            $table->string('Guardian_Mobile_Number')->nullable();
            $table->string('Guardian_Email')->nullable();
            $table->text('Present_Address')->nullable();
            $table->text('Permanent_Address')->nullable();
            $table->string('Photo')->default('Photo');
            $table->string('Section')->default('A');
            $table->string('Current_semester')->nullable();
            $table->string('Current_status')->nullable();
            $table->string('Payment_status')->nullable();
            $table->string('Major_1')->nullable();
            $table->string('Major_2')->nullable();
            $table->string('Minor_1')->nullable();
            $table->string('Minor_2')->nullable();
            $table->string('Remarks')->nullable();
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
        Schema::dropIfExists('student_infos');
    }
}
