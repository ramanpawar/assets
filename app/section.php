<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    public function users(){
        return $this->hasMany('App\User','section_id','id');
    }
}
