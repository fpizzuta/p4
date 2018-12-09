<?php

use Illuminate\Database\Seeder;
use App\Recordplayers;
class RecordplayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [1, 1, 1, 50, 0],
            [1, 2, 2, 45, 0],
            [1, 4, 3, 55, 1],
            [1, 3, 4, 35, 0],
            [2, 2, 1, 0, 0],
            [2, 1, 2, 0, 1],
            [3, 5, 1, 25,0],
            [3, 1, 2, 30,0],
            [3, 6, 1, 50,1 ],
            [4, 1, 1, 100, 1]
        ];

        foreach ($records as $key => $recordData) {
            $record = new Recordplayers();
            $record->created_at = Carbon\Carbon::now()->toDateTimeString();
            $record->updated_at = Carbon\Carbon::now()->toDateTimeString();
            $record->record_id = $recordData[0];
            $record->player_id = $recordData[1];
            $record->position = $recordData[2];
            $record->score = $recordData[3];
            $record->winner = $recordData[4];
            $record->save();
        }
    }
}
