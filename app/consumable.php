<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class consumable extends Model
{
    //
    public function cat(){
        return $this->belongsTo('App\category','category','id');
    }
}
