<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePgstudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pgstudents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('application_number')->nullable();
            $table->string('title');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('password');
            $table->string('faculty_id')->nullable();
            $table->string('dept_id')->nullable();
            $table->string('programme_id')->nullable();
            $table->string('specialization_id')->nullable();
            $table->string('programme')->nullable();
            $table->string('specialization')->nullable();
            $table->string('qualification')->nullable();
            $table->string('study_type')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('country_of_origin')->nullable();
            $table->string('state_of_origin')->nullable();
            $table->string('lga_of_origin')->nullable();
            $table->string('town_of_origin')->nullable();
            $table->string('location_of_origin')->nullable();
            $table->string('country_of_residence')->nullable();
            $table->string('state_of_residence')->nullable();
            $table->string('lga_of_residence')->nullable();
            $table->string('town_of_residence')->nullable();
            $table->string('location_of_residence')->nullable();
            $table->string('disability')->nullable();
            $table->text('funding')->nullable();
            $table->text('funding_type')->nullable();
            $table->text('previous_education')->nullable();
            $table->text('olevel')->nullable();
            $table->longText('employment')->nullable();
            $table->longText('first_referee')->nullable();
            $table->longText('second_referee')->nullable();
            $table->longText('supporting_information')->nullable();
            $table->longText('olevel_result')->nullable();
            $table->longText('education_certificates')->nullable();
            $table->longText('education_transcript')->nullable();
            $table->longText('nysc_certificate')->nullable();
            $table->longText('reference_1')->nullable();
            $table->longText('reference_2')->nullable();
            $table->longText('idcard')->nullable();
            $table->longText('indigene_certificate')->nullable();
            $table->longText('passport')->nullable();
            $table->longText('next_of_kin')->nullable();
            $table->text('status')->nullable();
            $table->int('step')->nullable();

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
        Schema::dropIfExists('pgstudents');
    }
}
