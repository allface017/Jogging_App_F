@extends('layouts.layout')


@section('title','top')

@section('header')
<link rel="stylesheet" href="/css/jogging_list.css">
@endsection


@section('content')
<form action="/jogging/add" method="post" class="form" enctype="multipart/form-data">
    @csrf
    <div class="nitizi">
        <label for="nitizi"><strong class="fo-si-24">日時</strong></label><br>
        <input id="nitizi" type="date" name="date" value="{{old('date')}}" required>
        @error('date')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="kyori">
        <label for="kyori"><strong class="fo-si-24">距離(km)</strong></label><br>
        <input id="kyori" type="number"  step="0.01" name="distance" value="{{old('distance')}}" required>
        @error('kyori')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="runtime">
        <label for="time"><strong class="fo-si-24">運動時間</strong></label><br>
        <div class="textbox">
            <input id="hh" type="number" class="ma-ri-5" name="hh" placeholder="hh" required> <span class="ma-ri-5">:</span>
            <input id="mm" type="number" class="ma-ri-5" name="mm" placeholder="mm" required> <span class="ma-ri-5">:</span>
            <input id="ss" type="number" class="ma-ri-5" name="ss" placeholder="ss" required>
            @error('time')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="space">
        <label for="place"><strong class="fo-si-24">運動場所</strong></label><br>
        <div class="radio-space">
            <input type="radio" name="location" id="out" value="外" checked="">
            <label for="out" class="switch-out ">外</label>
            <input type="radio" name="location" id="in" value="内">
            <label for="in" class="switch-in ">内</label>
        </div>
    </div>

    <div class="jogging-img">
        <label for="jogging"><strong class="fo-si-24">ジョギングコースの画像の添付</strong></label><br>
        <input id="jogging" type="file" name="jogging">
        @error('jogging')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="spot">
        <label for="spot"><strong class="fo-si-24">スポット</strong></label><br>
        <div>
            @foreach($spots as $spot)
            <label><input type="checkbox" name="spots[]" value="{{$spot->name}}" id="check{{$spot->id}}" onchange="check()">{{$spot->name}}</label>
            @endforeach
            <p class="fo-si-10">検索したいキーワードを入力してください。</p>
            <input id="spot" type="text" name="spot">
            @error('spot')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <label for="newspot" class="fo-si-24"><strong>新規スポット登録</strong></label>
        <p class="fo-si-10">新規で登録する場合はスポット名を入力してください。</p>
        <input id="newspot" type="text" name="newspot"> <button type="button" class="delete">－</button><br>
        <button type="button" class="add-btn"><strong>＋追加</strong></button><br>
    </div>
    

    <input type="submit" class="register" value="登録">
</form>

<script src="/js/add_checkbox.js"></script>
@endsection

@section('footer')
<!--  -->
@endsection