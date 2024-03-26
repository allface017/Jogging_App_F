@extends('layouts.layout')

@section('title','top')
@section('head')
<link rel="stylesheet" href="/css/jogging_list.css">
@endsection
@section('header')

    
@endsection

@section('content')
    <div class="goal">
        <div class="goal-value flex">
            <p>次の目標まであと</p>
            <h3>12.3km</h3>
        </div>
        <div class="gauge-value flex">
            <h2>50km</h2>
            <h2>100km</h2>
        </div>
        <div class="gauge-bar flex">
            <div class="left-circle"></div>
                <div class="gauge-div">
                    <!-- ここのstyleでゲージを調整 -->
                    <div class="gauge" style=" width: 50%;"></div>
                </div>
            <div class="right-circle"></div>
        </div>
        <a href="#" id="goal-link">目標設定へ</a>
    </div>


    <div class="link-div flex">
        <a href ="#">ジョギングデータ登録</a>
        <a href ="#">おすすめコース</a>
    </div>


    <div class="list-div">

        <div class="list-title">
            <h2>ジョギングデータ一覧</h2>
        </div>

        <div class="search-menu flex">
            <a href="#" id="narrow-down" class="flex">  
                <span class="material-symbols-outlined">page_info</span>
                <p>絞り込み</p>
            </a>
            <a href="#" id="registration-order"><p>登録順</p></a>
            <a href="#" id=""><P>昇順</P></a>
        </div>

        <a href="#" id="graph-link">グラフ表示へ</a>

        <div class="score-div flex">
            <div class="total-score flex">
                <h4>総合</h4>
                <div class="score-data flex">
                    <div>
                        <h5>50.4km</h5>
                        <h5>1:40:00</h5>
                    </div>
                    <div>
                        <p>(距離)</p>
                        <p>(運動時間)</p>
                    </div>    
                </div>
            </div>
            <div class="month-score flex">
                <h4>今月</h4>
                <div class="score-data flex">
                    <div>
                        <h5>1110.4km</h5>
                        <h5>113:40:00</h5>
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
            <li class="flex">
                <div class="date-div">
                    <h3>1/1</h3>
                    <div class="date-icon">
                         <span class="material-symbols-outlined">forest</span>
                    </div>
                </div>
                <div class="record-div">
                    <div class="flex">
                        <div class="flex"><h5>1110.4km</h5> <p>(距離)</p></div>
                        <div class="flex"><h5>113:40:00</h5><p>(運動時間)</p></div>
                    </div>
                    <ul class="spot-ul flex">
                        <li class="spot-icon">  <span class="material-symbols-outlined">location_on</span></li>
                        <li>イオンモール盛岡南</li><li>盛岡市子ども科学館</li><li>盛岡城跡公園</li><li>盛岡城跡公園</li>
                    </ul>
                </div>
                <div class="list-img"></div>
            </li>
            <li></li>
        </ul>
    </div>
    </div>

    
@endsection

@section('footer')
<!--  -->

@endsection