<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompJobTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comp_job', function(Blueprint $table)
		{
			$table->foreign('competence_id', 'epico_competence_link1')->references('competence_id')->on('comp')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
		Schema::table('comp_job', function(Blueprint $table)
		{
			$table->dropForeign('epico_competence_link1');
			$table->dropForeign('epico_job_link1');
		});
	}

}
