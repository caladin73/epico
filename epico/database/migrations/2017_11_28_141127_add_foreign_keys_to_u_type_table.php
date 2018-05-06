<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('u_type', function(Blueprint $table)
		{
			$table->foreign('user_id', 'epico_user_type_user_profile1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('u_type', function(Blueprint $table)
		{
			$table->dropForeign('epico_user_type_user_profile1');
		});
	}

}
