<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Player extends Model
{
    public function record()
    {
        return $this->belongsTo('App\Record');
    }

    public function player()
    {
        return $this->belongsTo('App\Recordplayers');
    }
}
