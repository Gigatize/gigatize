<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('sso')->unique();
			$table->string('name', 200);
			$table->string('email', 200)->unique();
			$table->string('role', 250)->nullable();
			$table->string('picture')->nullable();
            $table->rememberToken();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}