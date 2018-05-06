<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompJobTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comp_job', function(Blueprint $table)
		{
			$table->integer('competence_id');
			$table->integer('job_id')->index('epico_job_link1_idx');
			$table->integer('level');
			$table->integer('priority');
			$table->primary(['competence_id','job_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comp_job');
	}

}
