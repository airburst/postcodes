<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFksToPostcodes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//  Add Foreign Keys to Postcodes table
		Schema::table('postcodes', function(Blueprint $table)
		{
			
			$table->foreign('dc')->references('code')->on('districts');
			$table->foreign('wc')->references('code')->on('wards');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//  Remove Foreign Keys to Postcodes table
		Schema::table('postcodes', function(Blueprint $table)
		{
			$table->dropForeign('dc');
			$table->dropForeign('wc');
		});
	}

}
