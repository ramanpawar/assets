<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice_entry extends Model
{
    public function supp(){
        return $this->hasOne('App\supplier','id','supplier_id');
    }
}
