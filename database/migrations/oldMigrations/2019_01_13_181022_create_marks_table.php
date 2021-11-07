<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Registration_Number');
            $table->integer('course_id')->unsigned()->nullable();
            $table->string('grade_letter');
            $table->string('grade_point');
            $table->string('course_credit');
            $table->string('level')->nullable();
            $table->string('semester')->nullable();
            $table->string('academic_year')->nullable();
            $table->string('course_status')->nullable();
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
        Schema::dropIfExists('marks');
    }
}
