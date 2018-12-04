<?php

use Illuminate\Database\Seeder;
use App\Game;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $games = [
           ['Risk','',1],
           ['Chess','',1],
           ['Race for the Galaxy','',1],
           ['Puerto Rico','',1],
           ['Settlers of Catan','',1],
        ];

        $count = count($games);

        foreach ($games as $key => $playerData) {
            $player = new Game();

            $player->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $player->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $player->gameName = $playerData[0];
            $player->gameCover = $playerData[1];
            $player->createdby = $playerData[2];

            $player->save();
            $count--;
        }
    }
}
