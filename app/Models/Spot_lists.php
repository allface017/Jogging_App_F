<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spot_lists extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function jogs(){
        return $this->belongsTo('App\Models\Spots');
    }
    public function spots(){
        return $this->hasMany('App\Models\Spots');
    }

}
