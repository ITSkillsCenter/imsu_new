<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReasonToCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ict_payments', function (Blueprint $table) {
            $table->string('reason')->nullable()->after('amount');
            $table->string('receipt')->nullable()->after('reason');
            $table->string('status')->nullable()->after('receipt');
            $table->string('paid_via')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ict_payments', function (Blueprint $table) {
            //
        });
    }
}
