<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('threads', function(Blueprint $table)
		{
			$table->increments('id');
      $table->string('title');
      $table->string('description')->nullable();
      $table->integer('created_by');
      $table->integer('category_id')->unsigned();
      $table->foreign('category_id')
            ->references('id')->on('categories')
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
		Schema::drop('threads');
	}

}
