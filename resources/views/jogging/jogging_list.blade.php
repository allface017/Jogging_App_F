
@extends('layouts.layout')

@section('title','top')
@section('head')
<link rel="stylesheet" href="/css/jogging_list.css">
@endsection
@section('header')
@parent
    TOP
@endsection

@section('content')
    <div class="goal">
        <div class="goal-value flex">
            <p>次の目標まであと<span>12.3km</span></p>
        </div>
        <div class="gauge-value flex">
            <p>50km</p>
            <p>100km</p>
        </div>
        <div class="gauge-bar flex">
            <div class="left-circle"></div>
                <div class="gauge-div">
     
                    <div class="gauge" style=" width: 50%;"></div>
                </div>
            <div class="right-circle"></div>
        </div>
        <a href="/jogging/target" id="goal-link">目標設定へ</a>
    </div>

    <div class="link-div flex">
        <a href ="/jogging/add">ジョギングデータ登録</a>
        <a href ="/jogging/Course_Select">おすすめコース</a>
    </div>

    <div class="list-div">
        <div class="list-title">
            <h2>ジョギングデータ一覧</h2>
        </div>

        <div class="search-menu flex">
            <label class="find_check flex" for="find_check">
            <span class="material-symbols-outlined">page_info</span>
            <p>絞り込み</p>
            </label>
            <input type="checkbox" id="find_check" class="check-btn">
            <label for="find_check" class="form-close">
            <span class="material-symbols-outlined">close</span>
            </label>
            <div class="close-bac-div"></div>
            <form action="#" method="post" class="find_form">
                <h3 id="ex-dialog-3-title">日付</h3>
                <label><input type="radio" name="date" value="年月" checked="">年月</label>
                <label><input type="radio" name="date" value="年月日" checked="">年月日</label>

                <h3 id="ex-dialog-3-title">距離</h3>
                <div class="min-bar">
                    <p>最小：<span id="min-distance-value">0</span>km</p>
                    <input type="range" name="min_distance" id="min-distance" onchange="updateMinValue()" value="{{ $form['min_distance'] ?? '' }}">
                </div>
                <div class="max-bar">
                    <p>最大：<span id="max-distance-value">0</span>km</p>
                    <input type="range" name="max_distance" id="max-distance" onchange="updateMaxValue()" value="{{ $form['max_distance'] ?? '' }}">
                </div>

                <h3 id="ex-dialog-3-title">場所</h3>
                <label><input type="radio" name="location" value="外" checked="">外</label>
                <label><input type="radio" name="location" value="内" checked="">内</label>

                <h3 id="ex-dialog-3-title">スポット</h3>
                <label><input type="checkbox" name="spots[]" value="スポット１" id="1">スポット１</label>
                <label><input type="checkbox" name="spots[]" value="スポット２" id="2">スポット２</label>
                <label><input type="checkbox" name="spots[]" value="スポット３" id="3">スポット３</label>
                <p><button type="submit">確定する</button></p>
            </form>
            <a href="#" id="registration-order">登録順</a>
            <a href="#" id="">昇順</a>
        </div>

        <a href="#" id="graph-link">グラフ表示へ</a>

        <div class="score-div flex">
            <div class="total-score flex">
                <p>総合</p>
                <div class="score-data flex">
                    <div class="score-data-value">
                        <p>{{$all_sum}}km</p>
                        <p>1:40:00</p>
                    </div>
                    <div>
                        <p>(距離)</p>
                        <p>(運動時間)</p>
                    </div>    
                </div>
            </div>
            <div class="month-score flex">
                <p>今月</p>
                <div class="score-data flex">
                    <div  class="score-data-value">
                        <p>{{$month_sum}}km</p>
                        <p>113:40:00</p>
                    </div>
                    <div>
                        <p>(距離)</p>
                        <p>(運動時間)</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="list-data">
        <ul>
            @foreach($jogs as $jog)
                <li>
                    <a href="/jogging/info?id={{$jog['id']}}" class="flex">
                        <div class="date-div">
                            <p>{{$jog['date']}}</p>
                            <div class="date-icon">
                                <span class="material-symbols-outlined">forest</span>
                            </div>
                        </div>
                        <div class="record-div">
                            <div class="flex">
                                <div class="flex"><p>{{$jog['distance']}}</p> <p>(距離)</p></div>
                                <div class="flex"><p>{{$jog['time']}}</p><p>(運動時間)</p></div>
                            </div>
                            <ul class="spot-ul flex">
                                <li class="spot-icon">  <span class="material-symbols-outlined">location_on</span></li>
                                @foreach($jog['spot'] as $item_spot)
                                    @foreach($spots as $spot)
                                        @if($item_spot['spots_id'] == $spot['id'])
                                            <li>{{$spot['name']}}</li>
                                        @endif
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                        <img src="{{asset($jog['course'])}}" alt="jogging_img" class="list-img">
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

@endsection

@section('footer')
<!--  -->

@endsection



