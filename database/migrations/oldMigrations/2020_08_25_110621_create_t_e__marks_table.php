<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTEMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_e__marks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('evaluation_id');
            $table->integer('qs_category_id');
            $table->integer('qs_id');
            $table->integer('scale');
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
        Schema::dropIfExists('t_e__marks');
    }
}
