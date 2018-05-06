<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToJobTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('job', function(Blueprint $table)
		{
			$table->foreign('company_id', 'epico_job_company1')->references('company_id')->on('company')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('job_id', 'epico_job_profile1')->references('profile_id')->on('profile')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('job', function(Blueprint $table)
		{
			$table->dropForeign('epico_job_company1');
			$table->dropForeign('epico_job_profile1');
		});
	}

}
