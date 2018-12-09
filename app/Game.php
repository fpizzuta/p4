<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function gameName()
    {
        return $this->belongsTo('App\Record','game_id');
    }
}
