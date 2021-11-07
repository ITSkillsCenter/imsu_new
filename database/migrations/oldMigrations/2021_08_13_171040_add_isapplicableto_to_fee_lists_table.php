<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsapplicabletoToFeeListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fee_lists', function (Blueprint $table) {
            $table->string('is_applicable_to');
            $table->string('invoice_creation');
            $table->string('faculty_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fee_lists', function (Blueprint $table) {
            //
        });
    }
}
