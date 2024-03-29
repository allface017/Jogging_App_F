@extends('layouts.layout')

@section('title','top')

@section('header')
<link rel="stylesheet" href="/css/jogging_list.css">
@parent
    ジョギングデータ編集
@endsection

@section('content')

<form action="/jogging/edit" method="post" class="form" enctype="multipart/form-data">
@csrf
<input type="hidden" name="id" value="{{$jog['id']}}">
<div class="nitizi">
    <label for="nitizi"><strong class="fo-si-32">日時</strong></label><br>
    <input id="nitizi" type="date" name="date" value="{{$jog['date']}}" required>
    @error('date')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="kyori">
    <label for="kyori"><strong class="fo-si-32">距離(km)</strong></label><br>
    <input id="kyori" type="number" step="0.01" name="distance" value="{{$jog['distance']}}" required>
    @error('kyori')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>



<div class="runtime">
    <label for="time"><strong class="fo-si-32">運動時間</strong></label><br>

    <div class="textbox">
        <input id="hh" type="number" class="ma-ri-24" name="hh" placeholder="hh" value="{{$jog['hh']}}" required> <span
            class="ma-ri-24">:</span>
        <input id="mm" type="number" class="ma-ri-24" name="mm" placeholder="mm" value="{{$jog['mm']}}" required> <span
            class="ma-ri-24">:</span>
        <input id="ss" type="number" class="ma-ri-24" name="ss" placeholder="ss" value="{{$jog['ss']}}" required>

        @error('time')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>



<div class="space">
    <label for="place"><strong class="fo-si-32">運動場所</strong></label><br>

    <div class="radio-space">
        @if($jog['location'] == 0)
            <input type="radio" name="location" id="out" value="外" checked>
            <label for="out" class="switch-out ">外</label>
            <input type="radio" name="location" id="in" value="内">
            <label for="in" class="switch-in ">内</label>
        @else
            <input type="radio" name="location" id="out" value="外">
            <label for="out" class="switch-out ">外</label>
            <input type="radio" name="location" id="in" value="内" checked>
            <label for="in" class="switch-in ">内</label>
        @endif
    </div>

</div>



<div class="jogging-img">
    <label for="jogging"><strong class="fo-si-32">ジョギングコースの画像の添付</strong></label><br>


    <input id="jogging" type="file" name="jogging">


    @error('jogging')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>



<div class="spot">
    <label for="spot"><strong class="fo-si-32">スポット</strong></label><br>

    <div>
        <ul>
            @foreach($spots as $spot)
                    @if(in_array($spot->id, $spot_lists))
                    <label><input type="checkbox" name="spots[]" value="{{$spot->name}}" id="check{{$spot->id}}" checked>{{$spot->name}}</label>
                    @else
                    <label><input type="checkbox" name="spots[]" value="{{$spot->name}}" id="check{{$spot->id}}">{{$spot->name}}</label>
                    @endif
            @endforeach
        </ul>

        <p>検索したいキーワードを入力してください。</p>
        <input id="spot" type="text" name="spot">


        @error('spot')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>




    <label for="newspot" class="fo-si-24"><strong>新規スポット登録</strong></label>
    <p>新規で登録する場合はスポット名を入力してください。</p>
    <input id="newspot" type="text" name="newspot"> <button type="button" class="delete">－</button><br>

    <button type="button" class="add-btn">
        <strong>＋追加</strong>
    </button>
</div>


<input type="submit" class="add" value="登録">


</form>
@endsection

@section('footer')
<!--  -->
@endsection
