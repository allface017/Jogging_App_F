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
            <p>次の目標まであと<span>12.3km</span></p>
        </div>
        <div class="gauge-value flex">
            <p>50km</p>
            <p>100km</p>
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
            <a href="#" id="registration-order">登録順</a>
            <a href="#" id="">昇順</a>
        </div>

        <a href="#" id="graph-link">グラフ表示へ</a>

        <div class="score-div flex">
            <div class="total-score flex">
                <p>総合</p>
                <div class="score-data flex">
                    <div class="score-data-value">
                        <p>50.4km</p>
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
                        <p>1110.4km</p>
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
            <li class="flex">
                <a href="#" class="flex">
                    <div class="date-div">
                        <p>1/1</p>
                        <div class="date-icon">
                            <span class="material-symbols-outlined">forest</span>
                        </div>
                    </div>
                    <div class="record-div">
                        <div class="flex">
                            <div class="flex"><p>1110.4km</p> <p>(距離)</p></div>
                            <div class="flex"><p>113:40:00</p><p>(運動時間)</p></div>
                        </div>
                        <ul class="spot-ul flex">
                            <li class="spot-icon">  <span class="material-symbols-outlined">location_on</span></li>
                            <li>イオンモール盛岡南</li><li>盛岡市子ども科学館</li><li>盛岡城跡公園</li><li>盛岡城跡公園</li>
                        </ul>
                    </div>
                    <div class="list-img"></div>
                </a>    
            </li>
        </ul>
    </div>
    </div>




  
    
@endsection

@section('footer')
<!--  -->

@endsection