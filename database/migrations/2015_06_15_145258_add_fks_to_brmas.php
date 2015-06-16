<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFksToBrmas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//  Add Foreign Keys to Postcodes table
		Schema::table('brmas', function(Blueprint $table)
		{
			$table->foreign('code')->references('code')->on('lha_rates');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		$table->dropForeign('code');
	}

}
