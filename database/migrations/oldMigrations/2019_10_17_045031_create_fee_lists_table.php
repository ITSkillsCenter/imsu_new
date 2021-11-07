<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeeListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fee_name');
            $table->string('amount');
            $table->string('department')->nullable();
            $table->string('semester')->nullable();
            $table->string('fee_type')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('fee_lists');
    }
}
