<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recordplayers extends Model
{
    public function record()
    {
        return $this->belongsTo('App\Record');
    }

    public function playerName()
    {
        return $this->hasOne('App\Player','player_id','player_id');
    }
}
