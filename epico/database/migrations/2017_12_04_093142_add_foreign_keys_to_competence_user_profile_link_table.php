<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompetenceUserProfileLinkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('competence_user_profile_link', function(Blueprint $table)
		{
			$table->foreign('competence_id', 'epico_competence1')->references('competence_id')->on('competence')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_profile_id', 'epico_user_profile1')->references('id')->on('user_profile')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('competence_user_profile_link', function(Blueprint $table)
		{
			$table->dropForeign('epico_competence1');
			$table->dropForeign('epico_user_profile1');
		});
	}

}
