<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordplayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recordplayers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('record_id')->unsigned();
            $table->integer('player_id')->unsigned();
            $table->integer('position');
            $table->integer('score');
            $table->integer('winner');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recordplayers');
    }
}
