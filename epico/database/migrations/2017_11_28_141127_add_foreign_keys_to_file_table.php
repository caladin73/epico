<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('file', function(Blueprint $table)
		{
			$table->foreign('profile_id', 'epico_file_profile1')->references('profile_id')->on('profile')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('file', function(Blueprint $table)
		{
			$table->dropForeign('epico_file_profile1');
		});
	}

}
