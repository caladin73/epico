<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contact', function(Blueprint $table)
		{
			$table->integer('contact_id', true);
			$table->integer('profile_id')->index('epico_contact_profile1_idx');
			$table->string('street', 45);
			$table->string('city', 45);
			$table->string('zip_code', 8);
			$table->string('country', 45);
			$table->string('phone_number', 16);
			$table->integer('contact_type')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contact');
	}

}
