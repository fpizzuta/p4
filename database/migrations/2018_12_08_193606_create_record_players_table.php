<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_players', function (Blueprint $table) {
            $table->increments('record_players_id');
            $table->timestamps();
            $table->integer('record_id')->unsigned();
            $table->integer('player_id')->unsigned();
            $table->integer('position');
            $table->integer('score');
            $table->binary('winner');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('record_players');
    }
}
