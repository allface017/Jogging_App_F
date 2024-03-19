<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JoggingController extends Controller
{
    // ジョギングデータ表示

    // ジョギングデータ登録
    public function jogging_add(){
        // $categories = Categories::all();
        return view('jogging.jogging_add');
    }
}
