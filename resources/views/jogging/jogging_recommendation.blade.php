@extends('layouts.layout')

@section('title','top')
@section('head')
<link rel="stylesheet" href="/css/jogging_list.css">
<script async src="/js/jogging_recommendation.js"></script>
@endsection
@section('header')

    
@endsection

@section('content')

<div class="search-box">
        <h2>条件設定</h2>
        <form action="{{Route('jogging.course_serach')}}" method="post">
        @csrf
            <h3>距離</h3>
            <div class="min-bar">
                <p>最小：<span id="min-distance-value">0</span>km</p>
                <input type="range" name="min_distance" id="min-distance" onchange="updateMinValue()">
            </div>
            <div class="max-bar">
                <p>最大：<span id="max-distance-value">0</span>km</p>
                <input type="range" name="max_distance" id="max-distance" onchange="updateMaxValue()">
            </div>

            <h3>場所</h3>
            <div class="recommendation-radio">
                <input type="radio" name="location" >外
                <input type="radio" name="location">内
            </div>
        
            <h3>スポット</h3>
            <div class="recommendation-check">            
                @foreach($spots_list as $spots)
                    <input type="checkbox" name="spots[]" value="{{$spots->id }}">{{ $spots->name }}
                @endforeach
            </div>

            <input type="submit" name="送信" value="この条件で検索する">
        </form>
    </div>


    <div class="search-result">
        <h2>おすすめコースはこちら</h2>
        <p>過去に走ったデータをもとに抽出しています</p>
        @if ($message)
        <h1>{{ $message }}</h1>
    @endif
        
        <div class="list-data">
            <ul>
                @foreach($jogging as $jogs)
            <li class="flex">
                <div class="date-div">
                    <p>{{ $jogs ->date}}</p>
                    <div class="date-icon">
                        <span class="material-symbols-outlined">forest</span>
                    </div>
                </div>
                <div class="record-div">
                    <div class="flex">
                        <div class="flex"><p>{{ $jogs->distance }}</p> <p>(距離)</p></div>
                        <div class="flex"><p>{{ $jogs->time }}</p><p>(運動時間)</p></div>
                    </div>
                    <ul class="spot-ul flex">
                        <li class="spot-icon">  <span class="material-symbols-outlined">location_on</span></li>
                        @foreach($jogs->spots as $spot)
                            <li>{{ $spot->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="list-img" src="{{ $jogs->course}}"></div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
    
    <a href="#" class="return">戻る</a>
    
    @endsection
    
    @section('footer')
    <!--  -->
    @endsection
