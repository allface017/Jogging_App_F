@extends('layouts.mainapp')

@section('title','top')

@section('header')
    
@endsection

@section('content')
    

<div class="top-p">
        <p>以下の内容で登録が完了しました。</p>
    </div>


    <div class="form">

        <div class="日時">
            <p class="fo-si-32">日時</p>

            <p id="nitizi"></p>

        </div>


        <div class="距離">
            <p class="fo-si-32">距離(km)</p>

            <p id="kyori"></p>

        </div>


        <div class="運動時間">
            <p class="fo-si-32">運動時間</p>

            <p id="runtime"></p>

        </div>


        <div class="運動場所">
            <p class="fo-si-32" >運動場所</p>
            <div class="外か内">

                <p id="外">外</p>

                <p id="内">内</p>

            </div>

        </div>


        <div class="ジョギングコースの画像">
            <p class="fo-si-32">ジョギングコースの画像</p>

            <img src="#" alt="ジョギングコースの画像" id="jogging-img">

        </div>


        <div class="スポット">
            <p class="fo-si-32">スポット</p>

            <ul>
                <li>スポットA</li>
            </ul>

        </div>

    </div>


    <div id="戻るリンク">
        <a href="#">戻る</a>
    </div>

@endsection

@section('footer')
<!--  -->
@endsection