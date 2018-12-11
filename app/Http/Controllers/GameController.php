<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Record;
use App\Recordplayers;
use App\Player;
use App\Game;

class GameController extends Controller
{
    //

    public function index()
    {
//        $json = file_get_contents(database_path('/games.json'));
//        $data = (json_decode($json,true) == null) ? array() : json_decode($json,true);
////        dump($data);
//        return view('games.showAll')->with('data',$data);
        $data = Record::orderBy('created_at')->with('game')->get();

        return view('games.showAll')->with('data', $data);
    }

    public function show($title = null)
    {
        $record = Record::where('record_id', $title)->with('game')->get();
        $pivot = Recordplayers::where('record_id', $title)->orderby('position')->with('playerName')->get();

        return view('games.show')->with(['match' => $pivot, 'record' => $record[0]]);

    }

    public function delete($id = null)
    {
        Recordplayers::where('record_id',$id)->delete();
        Record::where('record_id',$id)->delete();
        return redirect('/games');
    }

    public function edit($id = null)
    {
        $record = Record::where('record_id', $id)->with('game')->get();
        $pivot = Recordplayers::where('record_id', $id)->orderby('position')->with('playerName')->get();
        $games = Game::orderBy('gameName')->get();
        $players = Player::orderBy('userName')->get();
        return view('games.edit')->with(['match' => $pivot, 'record' => $record[0], 'games' => $games, 'players' => $players]);
    }

    public function create()
    {
        $players = Player::orderBy('userName')->get();
        $games = Game::orderBy('gameName')->get();
        return view('games.create')->with(['players' => $players, 'games' => $games]);
    }

    public function makeArray($request)
    {
        $players = [[$request->p1_Name,1,$request->p1_Score,$request->p1_Winner],
            [$request->p2_Name,2,$request->p2_Score,$request->p2_Winner],
            [$request->p3_Name,3,$request->p3_Score,$request->p3_Winner],
            [$request->p4_Name,4,$request->p4_Score,$request->p4_Winner],
        ];
        return $players;
    }

    public function update(Request $request, $record_id)
    {
        $request->validate([
            'game_id' => 'required',
            'date' => 'required|date',
            'p1_Name' => 'required',
        ]);
        $record = Record::find($record_id);
        $record->date = $request->date;
        $record->game_id = (int)$request->game_id;
        $record->save();
        $players = GameController::makeArray($request);
        //Because i dont know if a user was removed I drop all recordplayers associated with record and then create new ones
        Recordplayers::where('record_id',$record_id)->delete();
        //Using position count in case someone dropped a player and didnt update sequence. Players will then be ordered sequentially again
        $position = 1;
        dump($players);
        foreach ($players as $player)
        {
            if ($player[0]) {
                $rp = new Recordplayers;
                $rp->record_id = $record_id;
                $rp->player_id = $player[0];
                $rp->position = $position;
                $position = $position + 1;
                $rp->score = $player[2];
                if ($player[3]) {
                    $rp->winner = 1;
                } else {
                    $rp->winner = 0;
                }
                $rp->save();
            }

        }
        return redirect('/games/'.$record_id);
    }



    public function store(Request $request)
    {
        $request->validate([
            'game_id' => 'required',
            'date' => 'required|date',
            'p1_Name' => 'required',
            'p1_Score' => 'nullable|numeric',
            'p2_Score' => 'nullable|numeric',
            'p3_Score' => 'nullable|numeric',
            'p4_Score' => 'nullable|numeric',
        ]);

        $record = new Record();
        $record->date = $request->date;
        $record->game_id = $request->game_id;
        //Change to the user id if I ever get login working
        $record->createdBy = 1;
        $record->save();
        //Grab the id of the record just made.
        $record_id = $record->record_id;
        //Create a recordplayer for each player in game
        $players = [[$request->p1_Name,1,$request->p1_Score,$request->p1_Winner],
                    [$request->p2_Name,2,$request->p2_Score,$request->p2_Winner],
                    [$request->p3_Name,3,$request->p3_Score,$request->p3_Winner],
                    [$request->p4_Name,4,$request->p4_Score,$request->p4_Winner],
        ];
        foreach ($players as $player)
        {
            if ($player[0])
            {
                $rp = new Recordplayers;
                $rp->record_id = $record_id;
                $rp->player_id = $player[0];
                $rp->position = $player[1];
                $rp->score = $player[2];
                if ($player[3]) {
                    $rp->winner = 1;
                } else
                {
                    $rp->winner = 0;
                }

                $rp->save();
            }
        }

        return redirect("/games");
    }
}
