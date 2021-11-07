<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFacultiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('faculties', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('faculty_id', 11)->nullable();
			$table->string('name', 191);
			$table->string('short_name', 191)->default('N/A');
			$table->string('email', 191);
			$table->string('slug', 225)->nullable();
			$table->text('about')->nullable();
			$table->text('why_study_here')->nullable();
			$table->text('alumni')->nullable();
			$table->text('image')->nullable();
			$table->text('benefit')->nullable();
			$table->string('phone_number')->nullable();
			$table->text('status');
			$table->string('remember_token', 100)->nullable();
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
		Schema::drop('faculties');
	}

}
