<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    //
    protected $fillable = ['name','gstno','address','mobile','email'];
}
