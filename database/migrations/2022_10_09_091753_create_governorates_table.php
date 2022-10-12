<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGovernoratesTable extends Migration {

	public function up()
	{
		Schema::create('governorates', function(Blueprint $table) {
			$table->increments('id');
			$table->string('governorate_name_ar');
			$table->string('governorate_name_en');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('governorates');
	}
}
