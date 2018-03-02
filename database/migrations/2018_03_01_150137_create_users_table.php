<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
            $table->string('email', 200)->unique();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
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