@extends('layouts.layout')

@section('title','top')

@section('header')
<style>
    .form{
        margin:100px 0;
    }
</style>
@endsection

@section('content')

<p class="top-p">以下の内容で登録が完了しました。</p>

<div class="form">
    <div class="nitizi">
        <p class="fo-si-32">日時</p>
        <p id="nitizi">{{$data->date}}</p>
    </div>

    <div class="kyori">
        <p class="fo-si-32">距離(km)</p>
        <p id="kyori">{{$data->distance}}km</p>
    </div>

    <div class="runtime">
        <p class="fo-si-32">運動時間</p>
        <p id="runtime">{{$data->time}}</p>
    </div>

    <div class="space">
        <p class="fo-si-32" >運動場所</p>
        <div class="out-in">
            <!-- <p id="out">外</p>
            <p id="in">内</p> -->
            {{$data->location}}
        </div>
    </div>

    <div class="jogging-img">
        <p class="fo-si-32">ジョギングコースの画像</p>
        <img src="{{asset($data->course)}}" alt="ジョギングコースの画像" id="jogging-img">
    </div>

    <div class="spot">
        <p class="fo-si-32">スポット</p>
        <ul>
            @foreach($spot_lists as $item)
                @foreach($spots as $spot)
                    @if($item->spots_id == $spot->id)
                        <li>{{$spot->name}}</li>
                    @endif
                @endforeach
            @endforeach
        </ul>
    </div>
</div>

<div id="return">
    <a href="">戻る</a>
</div>

@endsection

@section('footer')
<!--  -->
@endsection