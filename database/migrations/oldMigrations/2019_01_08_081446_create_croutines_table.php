<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCroutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('croutines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('course_code');
            $table->string('faculty');
            $table->string('time');
            $table->string('class_room');
            $table->string('day_of_week');
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
        Schema::dropIfExists('croutines');
    }
}
