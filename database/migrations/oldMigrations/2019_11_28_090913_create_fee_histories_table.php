<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeeHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fee_id');
            $table->string('student_id');
            $table->string('semester');
            $table->string('levelTerm');
            $table->string('date');
            $table->string('paid');
            $table->string('due');
            $table->string('payment_type')->nullable();
            $table->string('reg_type')->nullable();

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
        Schema::dropIfExists('fee_histories');
    }
}
