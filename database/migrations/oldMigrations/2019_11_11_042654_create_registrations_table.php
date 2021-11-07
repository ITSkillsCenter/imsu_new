<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('semester');
            $table->string('levelTerm');
            $table->string('student_id');
            $table->string('reg_type');
            $table->string('department')->nullable();
            $table->tinyInteger('dept_clearance')->default('0');
            $table->tinyInteger('hostel_clearance')->default('0');
            $table->tinyInteger('account_clearance')->default('0');
            $table->string('dept_approved')->nullable();
            $table->string('hostel_approved')->nullable();
            $table->string('account_approved')->nullable();
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
        Schema::dropIfExists('registrations');
    }
}
