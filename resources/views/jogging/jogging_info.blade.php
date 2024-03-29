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
        <input type="checkbox" id="img-up-btn">
        <label for="img-up-btn" class="img-label">
            <div class="detail-img">
                <img src="#">
                <span class="material-symbols-outlined">add_circle</span>
            </div>
        </label> 
        <div class="img-up-div">
            <img src="">
        </div>   
        <label for="img-up-btn" class="img-close">
            <span class="material-symbols-outlined">close</span>
        </label>
     
      
        <p class="detail-date">2024/03/24</p>
        <div class="ditail-data flex">
            <div class="flex">
                <p>距離</p>
                <p>1112.67km</p>
            </div>
            <div class="flex">
                <p>運動時間</p>
                <p>1101:23:45</p>
            </div>
        </div>
        <div class="detail-place">
            <h3>場所</h3>
            <div class="flex">
            <div class="date-icon">
                <span class="material-symbols-outlined">forest</span>
            </div>
                <p>外</p>
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