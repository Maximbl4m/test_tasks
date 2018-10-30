<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_score', function (Blueprint $table) {
            $table->increments('answer_score_id');
            $table->unsignedInteger('group_id');
            $table->unsignedInteger('answer_id');
            $table->foreign('group_id')->references('id')->on('group')->onDelete('cascade');
            $table->foreign('answer_id')->references('id')->on('answer')->onDelete('cascade');
            $table->integer('score');
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
        Schema::dropIfExists('answer_score');
    }
}
