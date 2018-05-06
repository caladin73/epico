<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompUTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comp_u', function(Blueprint $table)
		{
			$table->foreign('competence_id', 'epico_competence1')->references('competence_id')->on('comp')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_profile_id', 'epico_user_profile1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('comp_u', function(Blueprint $table)
		{
			$table->dropForeign('epico_competence1');
			$table->dropForeign('epico_user_profile1');
		});
	}

}
