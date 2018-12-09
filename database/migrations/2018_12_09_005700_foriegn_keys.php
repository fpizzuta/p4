<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForiegnKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('records', function (Blueprint $table) {
            $table->foreign('createdBy')->references('player_id')->on('players');
            $table->foreign('game_id')->references('game_id')->on('games');

           // $table->foreign('record_id')->references('record_id')->on('recordplayers');
        });

        Schema::table('recordplayers', function (Blueprint $table) {
            $table->foreign('player_id')->references('player_id')->on('players');
            $table->foreign('record_id')->references('record_id')->on('records');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('records', function (Blueprint $table) {

            # ref: http://laravel.com/docs/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('records_createdBy_foreign');
            $table->dropForeign('records_game_id_foreign');

        });

        Schema::table('recordplayers', function (Blueprint $table) {

            # ref: http://laravel.com/docs/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('records_player_id_foreign');
            $table->dropForeign('records_record_id_foreign');

        });
    }
}
