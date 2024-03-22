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
    public function index(){
        $user = Auth::id();
        // $spots = Spots::all();
        
        $jogs = Jogs::where([['users_id',(int)$user],['deleteflg',0]])->get();
        $data = array();
        foreach($jogs as $jog){
            // $spot_list = Spot_lists::where('jogs_id',$jog->id)->get();
            $spot_list = Spot_lists::with('spots')->where('jogs_id',$jog->id)->get();
            $items = [
                'id'=>$jog->id,
                'date'=>$jog->date,
                'distance'=>$jog->distance,
                'time'=>$jog->time,
                'course'=>$jog->course,
                'location'=>$jog->location,
                'spot'=>$spot_list,
            ];
            array_push($data,$items);
        }
        
        return view('jogging.jogging_list',['data'=>$data,'spot_list'=>$spot_list]);
        // return view('jogging.jogging_list');
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
}
