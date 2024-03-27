@extends('layouts.layout')

@section('title','top')
@section('head')
<link rel="stylesheet" href="/css/jogging_list.css">
@endsection
@section('header')

    
@endsection

@section('content')

<div class="search-box">
        <h2>条件設定</h2>
        <form action="" method="post">
            <h3>距離</h3>
            <div class="min-bar">
                <p>最小：<span>10km</span></p>
                <input type="range">
            </div>
            <div class="max-bar">
                <p>最大：<span>100km</span></p>
                <input type="range">
            </div>

            <h3>場所</h3>
            <div class="recommendation-radio">
                <label><input type="radio" name="" value="">外</label>
                <label><input type="radio" name="" value="">内</label>
            </div>
           
            <h3>スポット</h3>
            <div class="recommendation-check">
                <label><input type="checkbox" name="" value="">イオンモール盛岡南</label>
                <label><input type="checkbox" name="" value="">イオンモール盛岡南</label>
                <label><input type="checkbox" name="" value="">イオンモール盛岡南</label>
                <label><input type="checkbox" name="" value="">イオンモール盛岡南</label>
                <label><input type="checkbox" name="" value="">イオンモール盛岡南</label>
                <label><input type="checkbox" name="" value="">イオンモール盛岡南</label>
            </div>
         

            <input type="submit" name="送信" value="この条件で検索する">
        </form>
    </div>


    <div class="search-result">
        <h2>おすすめコースはこちら</h2>
        <p>過去に走ったデータをもとに抽出しています</p>
    

    <div class="list-data">
        <ul>
            <li class="flex">
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
            </li>
        </ul>
        </div>


        <a href="#" class="return">戻る</a>
        </div>

@endsection

@section('footer')
<!--  -->
@endsection