<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('users', function($table)
            {
                $table->increments('id');
                $table->string('first_name', 50);
                $table->string('last_name', 150);
                $table->string('email', 150);
                $table->string('password', 255);
                $table->string('remember_token', 255);
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
            Schema::drop('users');
	}

}
