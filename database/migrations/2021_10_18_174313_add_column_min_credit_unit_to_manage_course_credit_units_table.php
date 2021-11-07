<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnMinCreditUnitToManageCourseCreditUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('manage_course_credit_units', function (Blueprint $table) {
            $table->string('min_credit_unit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('manage_course_credit_units', function (Blueprint $table) {
            $table->dropColumn('min_credit_unit');
        });
    }
}
