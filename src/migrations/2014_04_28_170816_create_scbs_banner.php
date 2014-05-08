<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScbsBanner extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('scbs_banner', function(Blueprint $table)
		{
			$table->increments('id');
			
			$table->string('name', 255);
			$table->string('image_file_name', 300);
			$table->integer('published')->nullable()->default(0);
			
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
		//
		Schema::drop('scbs_banner');
	}

}
