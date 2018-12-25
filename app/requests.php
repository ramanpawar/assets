<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class requests extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function con()
    {
        return $this->belongsTo('App\consumable','item_id','id');
    }

    public function cat()
    {
        return $this->belongsTo('App\category','item_id','id');
    }
}
