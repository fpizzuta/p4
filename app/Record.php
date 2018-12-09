<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{

    protected  $primaryKey = 'record_id';

    public function game()
    {
        return $this->hasOne('App\Game','game_id','game_id');
    }

    public function madeBy()
    {
        return $this->hasOne('App\Player','player_id','createdBy');
    }

    public function players()
    {
//        return $this->belongsTo('App\Recordplayers','record_id','record_id');
        return $this->hasMany('App\Recordplayers','record_id','record_id');
    }
}
