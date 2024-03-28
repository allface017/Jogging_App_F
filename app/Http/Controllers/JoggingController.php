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
        $all_sum = 0.0;
        $all_sum_time = 0;
        foreach($jogs as $jog){
            $spot_list = Spot_lists::where('jogs_id',$jog->id)->get();
            $items = [
                'id'=>$jog->id,
                'date'=>date( "m/d", strtotime($jog->date)),
                'distance'=>number_format($jog->distance,2),
                'time'=>$jog->time,
                'course'=>$jog->course,
                'location'=>$jog->location,
                'spot'=>$spot_list,
            ];
            $all_sum += $jog->distance;
            array_push($data,$items);
        }
        $today_y = now()->format('Y');
        $today_m = now()->format('m');
        $jogs_sum = Jogs::whereYear('date',$today_y)->whereMonth('date',$today_m)->where([['users_id',(int)$user],['deleteflg',0]])->get();
        $month_sum = 0.0;
        foreach($jogs_sum as $jog){
            $month_sum += $jog->distance;
        }
        // dd($month_sum);
        
        return view('jogging.jogging_list',['jogs'=>$data,'spots'=>$spots,'all_sum'=>$all_sum,'month_sum'=>$month_sum]);
    }
    // ジョギングデータ登録
    public function jogging_add(){
        $spots = Spots::all();
        return view('jogging.jogging_add',['spots'=>$spots,]);
    }
    public function jogging_create(Request $request){
        $jogs = new Jogs;
        $spots = new Spots;
        
        unset($request['_token']);
        $form = $request->all();
        $user = Auth::id();
        $file_name = $request->file('jogging')->getClientOriginalName();
        $request->file('jogging')->storeAs('public/img',$file_name);
        $image_path = '/storage/img/'.$file_name;//画像のパスを作成
        $form['course'] = $image_path;
        $time = $form['hh'].':'.$form['mm'].':'.$form['ss'];
        $location = $form['location']=='外' ? 0 : 1;
        $data = [
            'users_id' => (int)$user,
            'date' => $form['date'],
            'distance' => $form['distance'],
            'time' => $time,
            'course' => $image_path,
            'location' => $location,
            'delete_flg' => 0,
        ];
        $jogs->fill($data)->save();

        $jog_id = Jogs::orderBy('id','desc')->first();
        $spots_db = Spots::all();
        if(is_array($form['spots'])){
            foreach($form['spots'] as $spot){
                foreach($spots_db as $spot_id){
                    if($spot == $spot_id->name){
                        $spots_id = $spot_id->id;
                    }
                }
                $spot_date = [
                    'jogs_id' => $jog_id->id,
                    'spots_id' => $spots_id,
                ];
                $spot_lists = new Spot_lists;
                $spot_lists->fill($spot_date)->save();
            }
        }else{
            foreach($spots_db as $spot_id){
                if($spot == $spot_id->name){
                    $spots_id = $spot_id->id;
                }
            }
            $spot_date = [
                'jogs_id' => $jog_id->id,
                'spots_id' => $spots_id,
            ];
            $spot_lists->fill($spot_date)->save();
        }
        // スポットの設定
        if($request->newspot != null){
            $spots->name = $request->newspot;
            $spots->save();
            $spots_id = Spots::orderBy('id','desc')->first();
            $spot_date = [
                'jogs_id' => $jog_id->id,
                'spots_id' => $spots_id->id,
            ];
            $spot_lists->fill($spot_date)->save();
        }
        
        // return view('jogging.jogging_comfirm',['data'=>$spot_date]);
        return redirect('/jogging/comfirm');
    }
    // ジョギングデータ登録結果
    public function jogging_comfirm(){
        $jog = Jogs::orderBy('id','desc')->first();
        $jog['date'] = date("Y-m-d", strtotime($jog->date));
        $jog['location'] = $jog->location == 0 ? '外' : '内';
        $spot_lists = Spot_lists::where('jogs_id',$jog->id)->get();
        $spots = Spots::all();
        return view('jogging.jogging_comfirm',['data'=>$jog,'spot_lists'=>$spot_lists,'spots'=>$spots]);
    }

    //ジョギングデータ詳細
    public function jogging_Details(Request $request){
        $jogs_id = $request->jogs_id;
        $users_id = Auth::id();
        $jogs = Jogs::where([['users_id',(int)$users_id],['jogs_id',$jogs_id],['deleteflg',0]])->get();
        $spot_list = Spot_lists::with('spots')->where('jogs_id',$jogs_id)->get();
        $items = [
            'date'=>$jogs->date,
            'distance'=>$jogs->distance,
            'time'=>$jogs->time,
            'course'=>$jogs->course,
            'location'=>$jogs->location,
        ];
        return view('jogging.target_sett',['items',$items,'spot_list',$spot_list]);


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
    //スポット編集画面へ
    public function spot_add(){
        $spots = Spots::all();
        // 各スポットごとにそのスポットがスポットリストに登録されている回数をカウント
        $spotCounts = [];
        foreach ($spots as $spot) {
            $count = Spot_lists::where('spots_id', $spot->id)->count();
            $spotCounts[$spot->id] = $count;
        }
        return view('jogging.spot_edit',['spots'=>$spots,'spotCounts' => $spotCounts,'key_name' => '','add_message' => '','edit_message' => '']);
    }
    //スポット追加
    public function spot_create(Request $request) {
        
        $spots = new spots;
        $form = $request->all();
            // 同じ名前のスポットが存在するかどうかをチェック
        $existingSpot = Spots::where('name', $form['name'])->first();
        if ($existingSpot) {
                // 同じ名前のスポットがスポットリストに存在する場合は、メッセージを表示して処理を中断
                $add_message = "同じ名前のスポットが既に存在し、スポットリストに登録されています。";
                $spots = Spots::all();  
                $spotCounts = [];
                foreach ($spots as $spot) {
                    $count = Spot_lists::where('spots_id', $spot->id)->count();
                    $spotCounts[$spot->id] = $count;
                }
                
                return view('jogging.spot_edit',['spots'=>$spots,'spotCounts' => $spotCounts,'add_message' => $add_message,'edit_message' => '','key_name' => '']);
            }
        
        $spots->name = $form['name']; 

        // スポットを保存
        $spots->save();

        $add_message = $spots->name."を追加しました。";

        $spots = Spots::all();

        // 各スポットごとにそのスポットがスポットリストに登録されている回数をカウント
        $spotCounts = [];
        foreach ($spots as $spot) {
            $count = Spot_lists::where('spots_id', $spot->id)->count();
            $spotCounts[$spot->id] = $count;
        }

        return view('jogging.spot_edit',['spots'=>$spots,'spotCounts' => $spotCounts,'add_message' => $add_message,'edit_message' => '','key_name' => '']);
    }
    //スポット編集
    public function spot_edit(Request $request) {
            // リクエストからスポットのIDと新しい名前を取得
        $spotId = $request->input('id');
        $newName = $request->input('name');

        // スポットのIDを使用してスポットを取得
        $spot = Spots::find($spotId);

        // スポットが見つかった場合は名前を更新
        if ($spot) {
            $edit_message = $spot->name."を".$newName."に変更しました。";
            $spot->name = $newName;
            $spot->save(); // スポットを保存
        }

        $spots = Spots::all();

        // 各スポットごとにそのスポットがスポットリストに登録されている回数をカウント
        $spotCounts = [];
        foreach ($spots as $spot) {
            $count = Spot_lists::where('spots_id', $spot->id)->count();
            $spotCounts[$spot->id] = $count;
        }

        return view('jogging.spot_edit',['spots'=>$spots,'spotCounts' => $spotCounts,'add_message' => '','edit_message' => $edit_message,'key_name' => '']);
    }
    //スポット検索
    public function spot_serach(Request $request){

        $key_name = $request->input('key_name');

        // キーワードを含むスポットを検索
        $spots = Spots::where('name', 'like', '%' . $key_name . '%')->get();

        // 各スポットごとにそのスポットがスポットリストに登録されている回数をカウント
        $spotCounts = [];
        foreach ($spots as $spot) {
            $count = Spot_lists::where('spots_id', $spot->id)->count();
            $spotCounts[$spot->id] = $count;
        }

        // 検索結果をビューに渡して表示
        return view('jogging.spot_edit', ['spots' => $spots,'spotCounts' => $spotCounts,'key_name' => $key_name,'add_message' => '','edit_message' => '',]);
    }
    //おすすめコース表示
    public function course_select(){
        // ログインしているユーザーのIDを取得
        $user_id = Auth::id();

        // ログインユーザーのジョギングデータを取得
        $jogs = Jogs::where('users_id', $user_id)->get();

        // ランダムな件数を決定するための最大件数を設定
        $max_random_count = 5;

        // jogsの件数を取得
        $total_jogs_count = $jogs->count();

        // ランダムな件数を決定
        $random_count = min($total_jogs_count, $max_random_count);
        
        // ログインユーザーのジョギングデータをランダムな件数取得
        $jogs = Jogs::where('users_id', $user_id)->inRandomOrder()->limit($random_count)->get();

        // スポットリストを取得
        $spot_list = Spots::all();

        // ジョギングデータに関連するスポットのIDを取得
        $spots_ids = Spot_lists::whereIn('jogs_id', $jogs->pluck('id'))->pluck('spots_id')->toArray();

        // スポットテーブルからジョギングデータに関連するスポットを取得
        $spots = Spots::whereIn('id', $spots_ids)->get();

        // ビューにデータを渡して表示
        return view('jogging.jogging_recommendation', [
            'spots_list' => $spot_list,
            'jogging' => $jogs,
            'spots' => $spots,
            'message' => ''
        ]);
    }
    //おすすめコース検索表示
    public function course_serach(Request $request){
        // フォームから送信された情報を取得
        $form = $request->all();
        
        // ログインしているユーザーのIDを取得
        $user_id = Auth::id();

        // ジョギングデータを取得するクエリを作成
        $jogs = Jogs::where('users_id', $user_id);

        $message = "検索条件：";
        // 最小距離の条件を追加
        if (!empty($form['min_distance'])) {
            // 最小距離を取得
            $minDistance = $form['min_distance'];
            $jogs->where('distance', '>=', $minDistance);
            $message .= "最小距離: {$minDistance}km, ";
        }
        
        // 最大距離の条件を追加
        if (!empty($form['max_distance'])) {
            // 最大距離を取得
            $maxDistance = $form['max_distance'];
            $jogs->where('distance', '<=', $maxDistance);
            $message .= "最大距離: {$maxDistance}km, ";
        }
        
        // 場所の条件を追加
        if (!empty($form['location'])) {
            // 場所の情報を取得
            if ($form['location'] == "外") {
                $location = false;
            } else {
                $location = true;
            }
            $jogs->where('location', $location);
            if ($form['location'] == "外") {
                $location = "外";
            } else {
                $location = "内";
            }
            $message .= "場所: {$location}, ";
        }
        
        // 選択されたスポットがあれば、それを含むジョギングデータを検索
        if (!empty($form['spots'])) {
            // スポットの情報を取得
            $selected_spots = $form['spots'] ?? []; // チェックされたスポットのIDの配列を取得
            $jogs->whereHas('spot_lists', function ($jogs) use ($selected_spots) {
                $jogs->whereIn('spots_id', $selected_spots);
            });
            // 選択されたスポットのIDからスポット名を取得
            $selected_spots_names = Spots::whereIn('id', $selected_spots)->pluck('name')->toArray();

            $message .= "選択されたスポット: " . implode(',', $selected_spots_names) . ", ";
        }
        
        // 最後のカンマを削除
        $message = rtrim($message, ', ');

        // 検索結果を取得
        $jogs = $jogs->get();
        
        // スポットリストを取得
        $spot_list = Spots::all();

        // ジョギングデータに関連するスポットのIDを取得
        $spots_ids = Spot_lists::whereIn('jogs_id', $jogs->pluck('id'))->pluck('spots_id')->toArray();

        // スポットテーブルからジョギングデータに関連するスポットを取得
        $spots = Spots::whereIn('id', $spots_ids)->get();

        // ビューにデータを渡して表示
        if ($jogs->isEmpty()) {
            $message = '条件に一致するジョギングデータはありませんでした。';
        } 
        
        // ビューにデータを渡して表示
        return view('jogging.jogging_recommendation', [
            'spots_list' => $spot_list,
            'jogging' => $jogs,
            'spots' => $spots,
            'message' => $message,
            'form' => $form,
        ]);
    }
}
