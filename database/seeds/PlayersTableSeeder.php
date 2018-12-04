<?php

use Illuminate\Database\Seeder;
use App\Player;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $players = [
            ['Frank'],
            ['Pete'],
            ['Dan'],
            ['Ray'],
            ['Bentley'],
            ['McShaf'],
            ['Kevin'],
            ['Brendan']
        ];

        $count = count($players);

        foreach ($players as $key => $playerData) {
            $player = new Player();

            $player->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $player->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $player->userName = $playerData[0];

            $player->save();
            $count--;
        }
    }
}
