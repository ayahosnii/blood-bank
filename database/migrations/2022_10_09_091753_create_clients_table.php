<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 255)->nullable();
			$table->string('email');
			$table->date('d_o_b');
			$table->integer('blood_type_id')->unsigned();
			$table->date('last_donation_date');
			$table->integer('governorate_id')->unsigned();
			$table->integer('city_id');
			$table->string('phone');
			$table->string('password');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('clients');
	}
}
