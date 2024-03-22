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
        $user = Auth::id();
        $spots = Spots::all();
        
        $jogs = Jogs::where([['users_id',(int)$user],['deleteflg',0]])->get();
        $data = array();
        foreach($jogs as $jog){
            $spot_list = Spot_lists::where('jogs_id',$jog->id)->get();
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
        
        return view('jogging.jogging_list',['jogs'=>$data,'spots'=>$spots]);
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
        //全体走行距離を取得
        $total_distance = Jogs::where('users_id',$user)->sum('distance');
        $user_id = Auth::id();
        // 達成されていない目標を更新
        $this->updateTargetAchievement($user_id);
        // 再度達成されていない目標を取得
        $target = Targets::where('users_id', $user_id)
        ->where('achieveflg', false)
        ->where('deleteflg', false)
        ->first();
        $target_list = Targets::where('users_id',$user)->where('deleteflg',false)->get();   

        return view('jogging.target_sett',['total' => $total_distance,'target' =>$target,'target_list'=>$target_list]);

    }
    //目的追加
    public function target_add(Request $request){
        $target = new Targets;
        $target->users_id = Auth::id();
        $target->target_distance = $request->target_distance;
        $target->reward = $request->reward;
        $target->created_at = now();
        $target->updated_at = now();    
        $target->deleteflg = false;
        $target->achieveflg = false;
        $target->save();
        
        return redirect('/jogging/target');
    }

    //目標を更新
    public function updateTargetAchievement($user_id) {
        // 全体走行距離を取得
        $total_distance = Jogs::where('users_id', $user_id)->sum('distance');
        // 達成されていない目標を取得
        $target = Targets::where('users_id', $user_id)
                        ->where('achieveflg', false)
                        ->where('deleteflg', false)
                        ->first();
        // 目標が存在し、目標距離に達していたら更新
        if ($target && $total_distance >= $target->target_distance) {
            $target->achieveflg = true;
            $target->save();
        }
    }

}
