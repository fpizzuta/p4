<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignkeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('records', function (Blueprint $table) {
//            $table->foreign('createdBy')->references('player_id')->on('players');
//            $table->foreign('game_id')->references('game_id')->on('games');
//            $table->foreign('p1_id')->references('player_id')->on('players');
//            $table->foreign('p2_id')->references('player_id')->on('players');
//            $table->foreign('p3_id')->references('player_id')->on('players');
//            $table->foreign('p4_id')->references('player_id')->on('players');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
