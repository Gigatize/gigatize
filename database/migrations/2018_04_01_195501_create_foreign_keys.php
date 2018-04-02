<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('projects', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('projects', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('projects', function(Blueprint $table) {
			$table->foreign('location_id')->references('id')->on('locations')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('project_user', function(Blueprint $table) {
			$table->foreign('project_id')->references('id')->on('projects')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('project_user', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('acceptance_criteria', function(Blueprint $table) {
			$table->foreign('project_id')->references('id')->on('projects')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('project_skill', function(Blueprint $table) {
			$table->foreign('project_id')->references('id')->on('projects')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('project_skill', function(Blueprint $table) {
			$table->foreign('skill_id')->references('id')->on('skills')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('skill_user', function(Blueprint $table) {
			$table->foreign('skill_id')->references('id')->on('skills')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('skill_user', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('project_sponsor', function(Blueprint $table) {
			$table->foreign('project_id')->references('id')->on('projects')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('project_sponsor', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('projects', function(Blueprint $table) {
			$table->dropForeign('projects_user_id_foreign');
		});
		Schema::table('projects', function(Blueprint $table) {
			$table->dropForeign('projects_category_id_foreign');
		});
		Schema::table('projects', function(Blueprint $table) {
			$table->dropForeign('projects_location_id_foreign');
		});
		Schema::table('project_user', function(Blueprint $table) {
			$table->dropForeign('project_user_project_id_foreign');
		});
		Schema::table('project_user', function(Blueprint $table) {
			$table->dropForeign('project_user_user_id_foreign');
		});
		Schema::table('acceptance_criteria', function(Blueprint $table) {
			$table->dropForeign('acceptance_criteria_project_id_foreign');
		});
		Schema::table('project_skill', function(Blueprint $table) {
			$table->dropForeign('project_skill_project_id_foreign');
		});
		Schema::table('project_skill', function(Blueprint $table) {
			$table->dropForeign('project_skill_skill_id_foreign');
		});
		Schema::table('skill_user', function(Blueprint $table) {
			$table->dropForeign('skill_user_skill_id_foreign');
		});
		Schema::table('skill_user', function(Blueprint $table) {
			$table->dropForeign('skill_user_user_id_foreign');
		});
		Schema::table('project_sponsor', function(Blueprint $table) {
			$table->dropForeign('project_sponsor_project_id_foreign');
		});
		Schema::table('project_sponsor', function(Blueprint $table) {
			$table->dropForeign('project_sponsor_user_id_foreign');
		});
	}
}