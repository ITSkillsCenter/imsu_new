<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('matric_number');
            $table->string('fathers_name');
            $table->string('fathers_place_of_work')->nullable();
            $table->string('fathers_role_at_work')->nullable();
            $table->string('fathers_monthly_income')->nullable();
            $table->string('mothers_name');
            $table->string('mothers_place_of_work')->nullable();
            $table->string('mothers_role_at_work')->nullable();
            $table->string('mothers_monthly_income')->nullable();
            $table->string('sponsor');
            $table->string('sponsors_name')->nullable();
            $table->string('sponsors_place_of_work')->nullable();
            $table->string('sponsors_role_at_work')->nullable();
            $table->string('sponsors_monthly_income')->nullable();
            $table->string('sponsors_relationship')->nullable();
            $table->longText('application_letter');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('scholarships');
    }
}
