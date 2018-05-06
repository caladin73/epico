<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompUTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comp_u', function(Blueprint $table)
		{
			$table->integer('competence_id');
			$table->integer('user_profile_id')->index('epico_competence_user_profile1_idx');
			$table->integer('level');
			$table->integer('priority');
			$table->primary(['competence_id','user_profile_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comp_u');
	}

}
