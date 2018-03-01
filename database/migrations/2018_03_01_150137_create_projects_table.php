<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsTable extends Migration {

	public function up()
	{
		Schema::create('projects', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 200);
			$table->integer('company_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('category_id')->unsigned()->nullable();
			$table->text('description');
			$table->text('potential_impact');
			$table->text('additional_information')->nullable();
			$table->integer('resources_requested');
			$table->integer('estimated_hours');
			$table->boolean('on_site');
			$table->boolean('renew');
			$table->boolean('flexible_start');
			$table->string('location', 200);
			$table->date('start_date');
			$table->date('deadline');
			$table->string('box_link', 200)->nullable();
			$table->boolean('complete');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('projects');
	}
}