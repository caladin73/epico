<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserProfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_profile', function(Blueprint $table)
		{
			$table->foreign('id', 'epico_user_profile_profile1')->references('profile_id')->on('profile')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_profile', function(Blueprint $table)
		{
			$table->dropForeign('epico_user_profile_profile1');
		});
	}

}
