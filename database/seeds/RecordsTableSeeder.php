<?php

use Illuminate\Database\Seeder;
use App\Record;

class RecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $records = [
            [1, '18-12-04', 1],
            [2, '18-12-03', 1],
            [5, '18-12-02', 1],
            [4, '18-12-02', 1]
        ];

        foreach ($records as $key => $recordData) {
            $record = new Record();
            $record->created_at = Carbon\Carbon::now()->toDateTimeString();
            $record->updated_at = Carbon\Carbon::now()->toDateTimeString();
            $record->game_id = $recordData[0];
            $record->date = $recordData[1];
            $record->createdBy = $recordData[2];
            $record->save();
        }
    }
}
