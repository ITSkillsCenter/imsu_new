<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('course_code', 191);
			$table->string('course_name', 191);
			$table->string('type')->nullable();
			$table->string('unit', 191);
			$table->string('Program', 191)->nullable();
			$table->string('level', 191)->nullable();
			$table->string('remarks')->nullable();
			$table->integer('croutine_id')->nullable();
			$table->integer('faculty_id')->nullable();
			$table->integer('dept_id')->nullable();
			$table->text('semester', 65535)->nullable();
			$table->boolean('status')->nullable()->default(1);
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
		Schema::drop('courses');
	}

}
