<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('heading', 65535);
			$table->text('content', 65535);
			$table->integer('user_id')->unsigned()->nullable()->index('articles_user_id_foreign');
			$table->dateTime('published_at');
			$table->integer('is_published')->unsigned()->default(1);
			$table->integer('is_deleted')->unsigned()->default(0);
			$table->integer('hit_count')->unsigned()->default(0);
			$table->integer('is_page')->unsigned()->default(0);
			$table->integer('comment_count')->unsigned()->default(0);
			$table->integer('vote')->unsigned()->default(0);
			$table->integer('category_id')->unsigned()->nullable()->index('articles_category_id_foreign');
			$table->string('language', 191)->default('ben');
			$table->timestamps();
			$table->integer('is_comment_enabled')->unsigned()->default(1);
			$table->string('type')->default('article');
			$table->text('image', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('articles');
	}

}
