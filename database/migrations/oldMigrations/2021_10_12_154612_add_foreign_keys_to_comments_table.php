<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comments', function(Blueprint $table)
		{
			$table->foreign('article_id')->references('id')->on('articles')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('parent_comment_id')->references('id')->on('comments')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('comments', function(Blueprint $table)
		{
			$table->dropForeign('comments_article_id_foreign');
			$table->dropForeign('comments_parent_comment_id_foreign');
			$table->dropForeign('comments_user_id_foreign');
		});
	}

}
