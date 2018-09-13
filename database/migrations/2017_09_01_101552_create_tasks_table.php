<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('tasks', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('project_id')->unsigned();
				$table->string('task_title');
				$table->boolean('completed')->default(0) ;          
				$table->date('start_date'); 
				$table->date('end_date'); 
				$table->timestamps();
			});
			
			/*
			Delete tasks associated with this project ID
			*/
			// Schema::table('tasks', function (Blueprint $table) {
			// 	$table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade') ;
			// 	$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade') ;
			// });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tasks');
	}
}
