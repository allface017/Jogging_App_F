@extends('layouts.layout')

@section('title','top')
@section('head')
<link rel="stylesheet" href="/css/jogging_list.css">
@endsection
@section('header')

    
@endsection

@section('content')
<div class="detail-div">
        <a href="/jogging/edit?id={{$jog['id']}}" id="detail-edit">編集</a>
        <input type="checkbox" id="img-up-btn">
        <label for="img-up-btn" class="img-label">
            <div class="detail-img">
                <img src="{{asset($jog['course'])}}" alt="jogging_img">
                <span class="material-symbols-outlined">add_circle</span>
            </div>
        </label> 
        <div class="img-up-div">
            <img src="{{asset($jog['course'])}}" alt="jogging_img">
        </div>   
        <label for="img-up-btn" class="img-close">
            <span class="material-symbols-outlined">close</span>
        </label>
     
      
        <p class="detail-date">{{$jog['date']}}</p>
        <div class="ditail-data flex">
            <div class="flex">
                <p>距離</p>
                <p>{{$jog['distance']}}km</p>
            </div>
            <div class="flex">
                <p>運動時間</p>
                <p>{{$jog['time']}}</p>
            </div>
        </div>
        <div class="detail-place">
            <h3>場所</h3>
            <div class="flex">
            <div class="date-icon">
                <span class="material-symbols-outlined">forest</span>
            </div>
                <p>{{$jog['location']}}</p>
            </div>
        </div>
        <div class="detail-spot">
            <h3>スポット</h3>
            <ul class="flex">
            <li class="spot-icon">  <span class="material-symbols-outlined">location_on</span></li>
                @foreach($spot_lists as $item_spot)
                    @foreach($spots as $spot)
                        @if($item_spot['spots_id'] == $spot['id'])
                            <li>{{$spot['name']}}</li>
                        @endif
                    @endforeach
                @endforeach
            </ul>
        </div>
    </div>
    <a href="/home" class="return">戻る</a>

     
@endsection

@section('footer')
<!--  -->

@endsection   