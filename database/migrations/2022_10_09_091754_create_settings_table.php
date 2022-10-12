<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->text('notification_settings_text');
			$table->text('about_app');
			$table->string('phone');
			$table->string('email');
			$table->string('fk_link');
			$table->string('tw_link');
			$table->string('insta_link');
			$table->string('yt_link');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}