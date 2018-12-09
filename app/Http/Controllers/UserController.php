<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;
use App\Player;
use App\Recordplayers;
use App\Game;

class UserController extends Controller
{
    public function index()
    {
        $players = Player::orderBy('userName')->get();
        return view('users.showAll')->with(['players' => $players]);
    }

    public function show()
    {
        return view('users.showAll');
    }

    public function practice()
    {
//        $data= Record::find(2)->players;
//        foreach ($data as $record)
//        {
//            dump($record->player_id);
//        }
        $players = Player::orderBy('userName')->get();
        return view('users.showAll')->with(['players' => $players]);

    }
}
