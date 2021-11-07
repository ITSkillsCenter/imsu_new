<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->unsignedInteger('subject_id')->notnull();
            $table->unsignedInteger('students_id');
            $table->string('department_id');
            $table->string('levelTerm');
            $table->tinyInteger('present')->default(0);
            $table->string('section')->nullable();
            $table->string('faculty_id')->nullable();
            $table->string('ip')->nullable();
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
        Schema::drop('attendances');
    }
}
