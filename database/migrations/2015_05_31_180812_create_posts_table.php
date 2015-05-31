<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');
      $table->string('title');
      $table->text('contents');
      $table->integer('created_by');
      $table->integer('category_id')->unsigned();
      $table->foreign('category_id')
            ->references('id')->on('categories')
            ->onDelete('cascade');
      $table->integer('thread_id')->unsigned();
      $table->foreign('thread_id')
            ->references('id')->on('threads')
            ->onDelete('cascade');
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
		Schema::drop('posts');
	}

}
