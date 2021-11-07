<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_certificates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('student_id');
            $table->string('ssc_c')->nullable();
            $table->string('ssc_m')->nullable();
            $table->string('hsc_c')->nullable();
            $table->string('hsc_m')->nullable();
            $table->string('cc')->nullable();
            $table->string('bc')->nullable();
            $table->string('ff')->nullable();
            $table->string('tc')->nullable();
            $table->string('mfc')->nullable();
            $table->string('blc')->nullable();
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
        Schema::dropIfExists('student_certificates');
    }
}
