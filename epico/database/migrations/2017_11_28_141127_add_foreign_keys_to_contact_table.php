<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contact', function(Blueprint $table)
		{
			$table->foreign('profile_id', 'epico_contact_profile1')->references('profile_id')->on('profile')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contact', function(Blueprint $table)
		{
			$table->dropForeign('epico_contact_profile1');
		});
	}

}
