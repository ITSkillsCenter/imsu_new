<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnlineClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online__classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('faculty_id');
            $table->integer('course_id');
            $table->string('level_term');
            $table->string('dept_id');
            $table->string('date_time');
            $table->string('link');
            $table->string('meeting_id');
            $table->string('meeting_password');
            $table->longText('remarks');
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
        Schema::dropIfExists('online__classes');
    }
}
