<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('content', 65535);
			$table->integer('article_id')->unsigned()->index('comments_article_id_foreign');
			$table->integer('user_id')->unsigned()->nullable()->index('comments_user_id_foreign');
			$table->integer('parent_comment_id')->unsigned()->nullable()->index('comments_parent_comment_id_foreign');
			$table->integer('is_published')->unsigned()->default(1);
			$table->dateTime('published_at')->nullable();
			$table->integer('countEdit')->unsigned()->default(0);
			$table->text('originalContent', 65535)->nullable();
			$table->integer('is_confirmed')->unsigned()->default(0);
			$table->string('token', 191)->nullable();
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
		Schema::drop('comments');
	}

}
