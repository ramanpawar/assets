<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class consumable extends Model
{
    //
    public function cat(){
        return $this->belongsTo('App\category','category','id');
    }

    public function item_masters(){
        return $this->belongsToMany('App\item_master')->with(timestamps);
    }
}
