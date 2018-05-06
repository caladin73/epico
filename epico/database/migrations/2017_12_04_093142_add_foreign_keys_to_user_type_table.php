<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_type', function(Blueprint $table)
		{
			$table->foreign('user_id', 'epico_user_type_user_profile1')->references('id')->on('user_profile')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_type', function(Blueprint $table)
		{
			$table->dropForeign('epico_user_type_user_profile1');
		});
	}

}
