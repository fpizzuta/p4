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
            [1, '18-12-04', 1, 50, 0, 2, 45, 0, 4, 55, 1, 3, 35, 0, 1],
            [2, '18-12-03', 2, 0, 1, 4, 0, 0, 4],
            [5, '18-12-02', 1, 25, 0, 2, 30, 0, 6, 50, 1, 1],
            [3, '18-12-02', 1, 100, 1,1]
        ];

        $count = count($records);

        foreach ($records as $key => $recordData) {
            $record = new Record();
            $total = count($recordData);
            $record->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $record->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $record->game_id = $recordData[0];
            $record->date = $recordData[1];
            $record->p1_id = $recordData[2];
            $record->p1_Score = $recordData[3];
            $record->p1_Winner = $recordData[4];
            $final = 5;
            if ($total > 6) {
                $record->p2_id = $recordData[5];
                $record->p2_Score = $recordData[6];
                $record->p2_Winner = $recordData[7];
                $final = 8;
            }
            if ($total > 9) {
                $record->p3_id = $recordData[8];
                $record->p3_Score = $recordData[9];
                $record->p3_Winner = $recordData[10];
                $final = 11;
            }
            if ($total > 12) {
                $record->p4_id = $recordData[11];
                $record->p4_Score = $recordData[12];
                $record->p4_Winner = $recordData[13];
                $final = 14;
            }

            $record->createdBy = $recordData[$final];

            $record->save();
            $count--;
        }
    }
}
