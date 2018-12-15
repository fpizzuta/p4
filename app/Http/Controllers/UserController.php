<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;
use App\Player;
use App\Recordplayers;
use App\Game;
use DB;



class UserController extends Controller
{
    public function index()
    {
        $players = Player::orderBy('userName')->get();
        // get the total number of games for each player
        $counts = Recordplayers::select('player_id', DB::raw('count(*) as total'))->groupBy('player_id')->with('playerName')->get();
        //using map to add a count attribute to each player and set it to zero.
        $players = $players->map(function ($player)
        {
            $player['count'] = 0;
            return $player;
        });
        foreach ($counts as $count)
        {
           //find index in $players of the player
           $key = $players->where('player_id',$count->player_id);
           //add a count field to that player with their total number of games
           $players[$key->keys()[0]]['count'] = $count->total;
        }

        return view('users.showAll')->with(['players' => $players]);
    }

    public function show()
    {
        return view('users.showAll');
    }

    public function addUser()
    {
        return view('users.addUser');
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'user' => 'required',
        ]);
        $player = new Player();
        $player->userName = $request->user;
        $player->save();
        return redirect('/users/')->with(['alert' => $request->user.' created.']);
    }

//    public function practice()
//    {
////        $data= Record::find(2)->players;
////        foreach ($data as $record)
////        {
////            dump($record->player_id);
////        }
//        $players = Player::orderBy('userName')->get();
//        return view('users.showAll')->with(['players' => $players]);
//
//    }
}
