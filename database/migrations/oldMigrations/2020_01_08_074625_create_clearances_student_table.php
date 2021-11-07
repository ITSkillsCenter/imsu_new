<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClearancesStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clearances_student', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('student_id');
            $table->tinyInteger('hostel')->default(0);
            $table->tinyInteger('transport')->default(0);
            $table->tinyInteger('canteen')->default(0);
            $table->tinyInteger('library')->default(0);
            $table->tinyInteger('department')->default(0);
            $table->tinyInteger('treasurer')->default(0);
            $table->text('tb_remarks')->nullable();
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
        Schema::dropIfExists('clearances_student');
    }
}
