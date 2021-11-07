<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrentSemesterRunningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('current__semester__runnings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('title');
            $table->longText('from');
            $table->longText('to');
            $table->longText('status');
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
        Schema::dropIfExists('current__semester__runnings');
    }
}
