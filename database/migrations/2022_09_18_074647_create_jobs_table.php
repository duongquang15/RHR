<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('priority');
            $table->date('request_date');
            $table->date('onboard_date');
            $table->integer('status');
            $table->string('note');
            $table->decimal('salary', 12, 2);
            $table->integer('amount');
            $table->string('name');
            $table->string('skill');
            $table->integer('user_id');
            $table->integer('block_id')->default(1);
            $table->integer('company_id')->default(1);
            $table->integer('level_id')->default(1);
            $table->integer('group_id')->default(1);
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
        Schema::dropIfExists('jobs');
    }
}
