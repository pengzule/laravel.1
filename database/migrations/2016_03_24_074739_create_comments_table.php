<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nickname');
			$table->string('email')->nullable();
			$table->string('website')->nullable();
			$table->text('content')->nullable();
			$table->string('user');
			$table->boolean('is_active')->default(0); 
			$table->integer('page_id')->unsigned()->index();
			$table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
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
		Schema::drop('comments');
	}

}
