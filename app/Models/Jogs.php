<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogs extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function spot_lists(){
        return $this->hasMany('App\Models\Spot_lists');
    }
    public function spots()
    {
        return $this->hasManyThrough(
            Spots::class,
            Spot_lists::class,
            'jogs_id', // jogsテーブルの外部キー
            'id', // spots_listsテーブルの外部キー
            'id', // jogsテーブルのローカルキー
            'spots_id' // spotsテーブルのローカルキー
        );
    }
}
