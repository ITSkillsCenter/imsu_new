<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToArticleKeywordTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('article_keyword', function(Blueprint $table)
		{
			$table->foreign('article_id')->references('id')->on('articles')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('keyword_id')->references('id')->on('keywords')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('article_keyword', function(Blueprint $table)
		{
			$table->dropForeign('article_keyword_article_id_foreign');
			$table->dropForeign('article_keyword_keyword_id_foreign');
		});
	}

}
