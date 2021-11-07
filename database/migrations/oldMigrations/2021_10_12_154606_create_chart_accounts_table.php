<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChartAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chart_accounts', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('account', 191);
			$table->string('name', 191);
			$table->integer('parent_id');
			$table->string('created_at', 191)->nullable();
			$table->string('updated_at', 191)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('chart_accounts');
	}

}
