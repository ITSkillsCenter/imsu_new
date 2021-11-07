<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToArticleImageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('article_image', function(Blueprint $table)
		{
			$table->foreign('article_id')->references('id')->on('articles')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('image_id')->references('id')->on('images')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('article_image', function(Blueprint $table)
		{
			$table->dropForeign('article_image_article_id_foreign');
			$table->dropForeign('article_image_image_id_foreign');
		});
	}

}
