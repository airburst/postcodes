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
			$table->integer('northing')->unsigned();
		    $table->integer('easting')->unsigned();
			$table->decimal('room', 10, 2);
			$table->decimal('one', 10, 2);
			$table->decimal('two', 10, 2);
			$table->decimal('three', 10, 2);
			$table->decimal('four', 10, 2);
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