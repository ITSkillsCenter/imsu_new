<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceivablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receivables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('student_id');
            $table->string('registration_id');
            $table->string('total');
            $table->string('paid')->nullabe();
            $table->string('due')->nullabe();
            $table->string('previous_due')->nullabe();
            $table->string('remarks')->nullabe();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('receivables');
    }
}
