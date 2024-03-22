<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Spots;
use App\Models\Jogs;
use App\Models\Spot_lists;

class JoggingController extends Controller
{
    // ジョギングデータ表示

    // ジョギングデータ登録
    public function jogging_add(){
        // $spots = Spots::all();
        // return view('jogging.jogging_add',['spots'=>$spots]);
        return view('jogging.jogging_add');
    }
    public function jogging_create(Request $request){
        $jogs = new Jogs;
        $spots = new spots;
        $form = $request->all();
        unset($form['_token']);
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/img',$file_name);
        $image_path = '/storage/img/'.$file_name;//画像のパスを作成
        

        $form['course'] = $image_path;
        $user = Auth::id();
        $form['user_id'] = (int)$user;
        $form['delete_flg'] = 0;
        $jogs->fill($form)->save();

        $jog_id = Jogs::orderBy('id','desc')->first();
        // スポットの設定
        if($request->spots() != null || $request->newspots() != null){
            foreach($request->newspots() as $spot){
                $spots->jogs_id = $jog_id;
                // スポットがidで渡されていた場合
                $spots->spots_id = $spot;
                $spots->save();
            }
        }
        return redirect('/jogging');
    }
}