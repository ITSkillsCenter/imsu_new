<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticleKeywordTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article_keyword', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('article_id')->unsigned()->index('article_keyword_article_id_foreign');
			$table->integer('keyword_id')->unsigned()->index('article_keyword_keyword_id_foreign');
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
		Schema::drop('article_keyword');
	}

}
