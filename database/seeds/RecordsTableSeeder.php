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
            ['1', '18-12-04', 1, 50, 0, 2, 45, 0, 4, 55,1,1],
        ];

        $count = count($records);
        $total = count($records);

        foreach ($records as $key => $recordData) {
            $record = new Record();

            $record->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $record->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $record->gameID = $recordData[0];
            $record->date = $recordData[1];
            $record->p1_ID = $recordData[2];
            $record->p1_Score = $recordData[3];
            $record->p1_Winner = $recordData[4];
            $final = 5;
            if ($total>4) {
                $record->p2_ID = $recordData[5];
                $record->p2_Score = $recordData[6];
                $record->p2_Winner = $recordData[7];
                $final = 8;
            }
            if ($total>7) {
                $record->p3_ID = $recordData[8];
                $record->p3_Score = $recordData[9];
                $record->p3_Winner = $recordData[10];
                $final = 11;
            }
            if($total>10) {
                $record->p4_ID = $recordData[11];
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
