<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration {

	public function up()
	{
		Schema::create('companies', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 75)->unique();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('companies');
	}
}