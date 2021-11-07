<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceivableDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receivable_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('student_id'); 
            $table->date('date');
            $table->string('particular');
            $table->integer('amount');
            $table->string('account_type');
            $table->string('receivable_id');
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
        Schema::dropIfExists('receivable_details');
    }
}
