<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->string('image');
			$table->text('content');
			$table->smallInteger('category_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}