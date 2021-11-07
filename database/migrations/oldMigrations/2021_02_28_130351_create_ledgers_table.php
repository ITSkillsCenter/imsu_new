<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('chart_account_id'); 
            $table->string('student_id')->nullable(); 
            $table->date('date');
            $table->string('particular');
            $table->integer('amount');
            $table->string('account_type');
            $table->string('receivable_id')->nullable();
            $table->string('fee_list_id')->nullable(); 
            $table->string('fee_id')->nullable(); 
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('ledgers');
    }
}
