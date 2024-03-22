<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Spots;
use App\Models\Jogs;
use App\Models\Spot_lists;
use App\Models\Targets;

class JoggingController extends Controller
{
    // ジョギングデータ表示
    public function index(){
        // $spots = Spots::all();
        // $Jogs = Jogs::all();
        // return view('jogging.jogging_add',['spots'=>$spots]);
        return view('jogging.jogging_list');
    }

    // ジョギングデータ登録
    public function jogging_add(){
        $spots = Spots::all();
        return view('jogging.jogging_add',['spots'=>$spots]);
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
    //目標設定表示
    public function target_index(){
        $user = Auth::id();
        $total_distance = Jogs::where('users_id',$user)->sum('distance');
        $target = Targets::where('users_id',$user)->where('achieveflg',false)->where('deleteflg',false)->first();
        $target_list = Targets::where('users_id',$user)->where('deleteflg',false)->get();

        return view('jogging.target_sett',['total' => $total_distance,'tagert' =>$target,'target_list'=>$target_list]);

    }
    //目的追加
    public function target_add(Request $request){
        $target = new Targets;
        $target->users_id = Auth::id();
        $target->target_distance = $request->distance;
        $target->reward = $request->reward;
        $target->deleteflg = false;
        $target->achieveflg = false;
        $target->save();
        
        return redirect('/jogging/target');
    }
}
