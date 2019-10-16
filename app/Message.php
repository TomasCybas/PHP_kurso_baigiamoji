<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function group(){
        return $this->belongsTo('App\Group');
    }

    public function sender(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }


}
