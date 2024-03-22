<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spots extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function spot_lists(){
        return $this->hasMany('App\Models\Spot_lists');
    }
    // public function spot_lists(){
    //     return $this->belongsTo(Spot_lists::class, 'post_number');
    // }
}
