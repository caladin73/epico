<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompetenceJobLinkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('competence_job_link', function(Blueprint $table)
		{
			$table->foreign('competence_id', 'epico_competence_link1')->references('competence_id')->on('competence')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('job_id', 'epico_job_link1')->references('job_id')->on('job')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('competence_job_link', function(Blueprint $table)
		{
			$table->dropForeign('epico_competence_link1');
			$table->dropForeign('epico_job_link1');
		});
	}

}
