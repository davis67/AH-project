<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('requested_by')->nullable();
            $table->string('leaveType');
            $table->string('startdate');
            $table->string('enddate');
            $table->string('leavedetail');
            $table->integer('duration')->nullable();
            $table->string('status')->default('submitted');
            $table->string('supervisor_comment')->nullable();
            $table->string('reject_comment')->nullable();
            $table->string('ek_comment')->nullable();
            $table->string('hr_comment')->nullable();
            $table->boolean('activated')->default(true);
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
        Schema::dropIfExists('leaves');
    }
}
