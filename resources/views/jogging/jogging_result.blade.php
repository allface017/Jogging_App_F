@extends('layouts.layout')

@section('title','top')
@section('head')
<link rel="stylesheet" href="/css/jogging_list.css">
@endsection
@section('header')

    
@endsection

@section('content')

<div class="detail-div">
        <a href="#" id="detail-edit">編集</a>
        <div class="detail-img">
            <img src="#">
        </div>
        <h3 class="detail-date">2024/03/24</h3>
        <div class="ditail-data flex">
            <div class="flex">
                <h4>距離</h4>
                <h5>1112.67km</h5>
            </div>
            <div class="flex">
                <h4>運動時間</h4>
                <h5>1101:23:45</h5>
            </div>
        </div>
        <div class="detail-place">
            <h3>場所</h3>
            <div class="flex">
            <div class="date-icon">
                <span class="material-symbols-outlined">forest</span>
            </div>
                <h5>外</h5>
            </div>
        </div>
        <div class="detail-spot">
            <h3>スポット</h3>
            <ul class="flex">
            <li class="spot-icon">  <span class="material-symbols-outlined">location_on</span></li>
                <li>イオンモール盛岡南</li><li>盛岡市子ども科学館</li><li>盛岡城跡公園</li><li>盛岡城跡公園</li>
            </ul>
        </div>
    </div>
    <a href="#" class="return">戻る</a> 



@endsection

@section('footer')
<!--  -->

@endsection