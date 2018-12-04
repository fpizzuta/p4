<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('createdBy');
            $table->date('date');
            $table->integer('gameID');
            $table->integer('p1_ID');
            $table->integer('p1_Score');
            $table->binary('p1_Winner');
            $table->integer('p2_ID');
            $table->integer('p2_Score');
            $table->binary('p2_Winner');
            $table->integer('p3_ID');
            $table->integer('p3_Score');
            $table->binary('p3_Winner');
            $table->integer('p4_ID');
            $table->integer('p4_Score');
            $table->binary('p4_Winner');

//            $table->foreign('createdBy')->references('userId')->on('players');
//            $table->foreign('gameID')->references('gameID')->on('games');
//            $table->foreign('p1_ID')->references('userId')->on('players');
//            $table->foreign('p2_ID')->references('userId')->on('players');
//            $table->foreign('p3_ID')->references('userId')->on('players');
//            $table->foreign('p4_ID')->references('userId')->on('players');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
}
