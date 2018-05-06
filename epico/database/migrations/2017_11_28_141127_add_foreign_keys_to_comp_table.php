<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comp', function(Blueprint $table)
		{
			$table->foreign('parent_id', 'epico_competence_competence1')->references('competence_id')->on('comp')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('comp', function(Blueprint $table)
		{
			$table->dropForeign('epico_competence_competence1');
		});
	}

}
