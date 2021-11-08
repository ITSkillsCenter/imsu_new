<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUnionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('unions', function(Blueprint $table)
		{
			$table->foreign('upazilla_id', 'unions_ibfk_2')->references('id')->on('upazilas')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('unions', function(Blueprint $table)
		{
			$table->dropForeign('unions_ibfk_2');
		});
	}

}