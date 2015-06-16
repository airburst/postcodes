<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLhaRatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lha_rates', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('code')->unsigned();
			$table->string('name');
			$table->decimal('room', 10, 2);
			$table->decimal('1bed', 10, 2);
			$table->decimal('2bed', 10, 2);
			$table->decimal('3bed', 10, 2);
			$table->decimal('4bed', 10, 2);
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
		Schema::drop('lha_rates');
	}

}

//INSERT INTO `lha_rates` VALUES (null, 86, 'Ashford', 67.10, 119.09, 145.43, 168.00, 223.63);