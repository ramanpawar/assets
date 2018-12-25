<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asset_master extends Model
{
    public function item()
    {
        return $this->belongsTo('App\item_master','item_id','id');
    }
}
