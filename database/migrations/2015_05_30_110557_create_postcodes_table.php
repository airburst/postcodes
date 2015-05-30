<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostcodesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('postcodes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('pc', 10)->unique();
			$table->integer('pq')->unsigned();
			$table->bigInteger('ea')->unsigned();
			$table->bigInteger('no')->unsigned();
			$table->string('cy', 9);
			$table->string('rh', 9)->nullable();
			$table->string('lh', 9);
			$table->string('cc', 9)->nullable();
			$table->string('dc', 9);
			$table->string('wc', 9);
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
		Schema::drop('postcodes');
	}

}
