<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item_master extends Model
{
    //
    public function cat(){
        return $this->belongsTo('App\category','category','id');
    }
    public function spec(){
        return $this->hasOne('App\specification','id','specification');
    }
}
