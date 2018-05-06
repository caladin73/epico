<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserProfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_profile', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('name', 45)->nullable();
			$table->string('email', 45)->unique('email_UNIQUE');
			$table->string('password')->nullable();
			$table->string('password_salt', 45)->nullable();
			$table->string('remember_token')->nullable();
			$table->string('linkedin_id', 45)->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_profile');
	}

}
