<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('job', function(Blueprint $table)
		{
			$table->integer('job_id')->unique('job_id_UNIQUE');
			$table->integer('company_id')->nullable()->index('epico_job_company1_idx');
			$table->dateTime('start_date');
			$table->dateTime('end_date');
			$table->string('title', 45);
			$table->string('description');
			$table->string('duration', 45);
			$table->string('location', 45);
			$table->string('guid', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('job');
	}

}
