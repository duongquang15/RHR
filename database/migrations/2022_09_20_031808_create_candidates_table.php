<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('candidate_name');
            $table->date('birthday');
            $table->integer('gender');
            $table->string('phone');
            $table->string('email');
            $table->string('facebook');
            $table->date('sent_date_cv');
            $table->string('school');
            $table->string('cv');
            $table->string('note');
            $table->string('skill');
            $table->string('experience');
            $table->decimal('current_salary', 12, 2);
            $table->decimal('desired_salary',12,2);
            $table->integer('status');
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
        Schema::dropIfExists('candidates');
    }
}
