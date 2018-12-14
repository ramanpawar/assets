<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice_details extends Model
{
    //
    public function entry(){
        return $this->belongsTo('App\invoice_entry','invoice_id','id');
    }

    public function cat(){
        return $this->belongsTo('App\category','category','id');
    }

    public function consumable(){
        return $this->belongsTo('App\consumable','item_id','id');
    }

    public function item(){
        return $this->belongsTo('App\item_master','item_id','id');
    }
}
