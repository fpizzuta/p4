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
            $table->increments('records_id');
            $table->timestamps();
            $table->integer('createdBy')->unsigned();
            $table->date('date');
            $table->integer('game_id')->unsigned();
//            $table->integer('p1_id')->unsigned();
//            $table->integer('p1_Score');
//            $table->binary('p1_Winner');
//            $table->integer('p2_id')->nullable()->unsigned();
//            $table->integer('p2_Score')->nullable();
//            $table->binary('p2_Winner')->nullable();
//            $table->integer('p3_id')->nullable()->unsigned();
//            $table->integer('p3_Score')->nullable();
//            $table->binary('p3_Winner')->nullable();
//            $table->integer('p4_id')->nullable()->unsigned();
//            $table->integer('p4_Score')->nullable();
//            $table->binary('p4_Winner')->nullable();
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
