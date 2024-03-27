@extends('layouts.mainapp')

@section('title','top')

@section('header')
    
@endsection

@section('content')
    
<p class="top-p">以下の内容で登録が完了しました。</p>

<div class="form">
    <div class="nitizi-com">
        <p class="fo-si-32">日時</p>
        <p id="nitizi-com"></p>
    </div>

    <div class="kyori-com">
        <p class="fo-si-32">距離(km)</p>
        <p id="kyori-com"></p>
    </div>

    <div class="runtime-com">
        <p class="fo-si-32">運動時間</p>
        <p id="runtime-com"></p>
    </div>

    <div class="space-com">
        <p class="fo-si-32">運動場所</p>
        <div class="out-in-com">
            <p id="out-com">外</p>
            <p id="in-com">内</p>
        </div>
    </div>

    <div class="jogging-img-com">
        <p class="fo-si-32">ジョギングコースの画像</p>
        <img src="#" alt="ジョギングコースの画像" id="jogging-img-com">
    </div>

    <div class="spot-com">
        <p class="fo-si-32">スポット</p>
        <ul>
            <li>スポットA</li>
        </ul>
    </div>
</div>

<div id="return-com">
    <a href="#">戻る</a>
</div>

@endsection

@section('footer')
<!--  -->
@endsection