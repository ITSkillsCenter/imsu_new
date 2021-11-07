<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticleImageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article_image', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('image_id')->unsigned()->index('article_image_image_id_foreign');
			$table->integer('article_id')->unsigned()->index('article_image_article_id_foreign');
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
		Schema::drop('article_image');
	}

}
