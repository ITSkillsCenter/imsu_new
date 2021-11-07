<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManageCourseCreditUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_course_credit_units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('department_id');
            $table->string('faculty_id');
            $table->string('program_id');
            $table->string('level')->nullable();
            $table->string('max_credit_unit')->nullable();
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
        Schema::dropIfExists('manage_course_credit_units');
    }
}
