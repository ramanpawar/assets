<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asset_issue extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function asset()
    {
        return $this->belongsTo('App\asset_master','asset_id','id');
    }
}
