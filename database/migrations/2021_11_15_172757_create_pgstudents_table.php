<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePgstudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pgstudents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('email');
            $table->date('dob');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('country_of_origin');
            $table->string('state_of_origin');
            $table->string('lga_of_origin');
            $table->string('town_of_origin');
            $table->string('location_of_origin');
            $table->string('country_of_residence');
            $table->string('state_of_residence');
            $table->string('town_of_residence');
            $table->string('location_of_residence');
            $table->string('disability');

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
        Schema::dropIfExists('pgstudents');
    }
}
