<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('company', function(Blueprint $table)
		{
			$table->foreign('company_id', 'epico_company_profile1')->references('profile_id')->on('profile')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id', 'epico_company_user_profile1')->references('id')->on('user_profile')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('company', function(Blueprint $table)
		{
			$table->dropForeign('epico_company_profile1');
			$table->dropForeign('epico_company_user_profile1');
		});
	}

}
