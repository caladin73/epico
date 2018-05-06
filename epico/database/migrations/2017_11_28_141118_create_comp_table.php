<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comp', function(Blueprint $table)
		{
			$table->integer('competence_id', true);
			$table->integer('parent_id')->index('epico_competence_competence1_idx');
			$table->string('name', 45);
			$table->string('description');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comp');
	}

}
