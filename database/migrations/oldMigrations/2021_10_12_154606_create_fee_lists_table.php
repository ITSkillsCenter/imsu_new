<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeeListsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fee_lists', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('pms_id', 191)->nullable();
			$table->string('remita_service_id', 225)->nullable();
			$table->string('fee_name', 191);
			$table->string('amount', 191);
			$table->string('faculty_id', 225)->nullable();
			$table->string('department_id')->nullable();
			$table->string('is_schoolfees', 191)->nullable();
			$table->string('is_applicable_to', 225)->nullable();
			$table->string('invoice_creation')->nullable();
			$table->string('fee_type', 191)->nullable();
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
		Schema::drop('fee_lists');
	}

}
