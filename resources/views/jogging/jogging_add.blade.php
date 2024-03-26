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

<form action="/jogging/add" method="post" class="form" enctype="multipart/form-data">
    @csrf
    <div class="日時">
        <label for="nitizi"><strong class="fo-si-32">日時</strong></label><br>
        <input id="nitizi" type="date"  name="date" value="{{old('date')}}" required>
        @error('date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="距離">
        <label for="kyori" ><strong class="fo-si-32">距離(km)</strong></label><br>
        <input id="kyori" type="number"  name="distance" value="{{old('distance')}}" step="0.01" required>
        @error('kyori')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="運動時間">
        <label for="time" ><strong class="fo-si-32">運動時間</strong></label><br>
        <div class="テキストボックス">
            <input id="hh" type="number" max="23" oninput="javascript: this.value = this.value.slice(0, 2);" class="ma-ri-24" name="hh" placeholder="hh" value="{{old('hh')}}" required> <span
                class="ma-ri-24">:</span>
            <input id="mm" type="number" max="59" oninput="javascript: this.value = this.value.slice(0, 2);" class="ma-ri-24" name="mm" placeholder="mm" value="{{old('mm')}}" required> <span
                class="ma-ri-24">:</span>
            <input id="ss" type="number" max="59" oninput="javascript: this.value = this.value.slice(0, 2);" class="ma-ri-24" name="ss" placeholder="ss" value="{{old('ss')}}" required>

            @error('time')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="運動場所">
        <label for="place" ><strong class="fo-si-32">運動場所</strong></label><br>
        <div class="radio-space">
            <input type="radio" name="location" id="out" value="外" checked="">
            <label for="out" class="switch-out ">外</label>

            <input type="radio" name="location" id="in" value="内">
            <label for="in" class="switch-in ">内</label>
        </div>
    </div>

    <div class="ジョギングコースの画像の添付">
        <label for="jogging" ><strong class="fo-si-32">ジョギングコースの画像の添付</strong></label><br>
        <input id="jogging" type="file" name="jogging">
        @error('jogging')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="スポット">
        <label for="spot" ><strong class="fo-si-32">スポット</strong></label><br>
        <div>
        <!-- <ul>
            <li>スポットA</li>
        </ul> -->
        @foreach($spots as $spot)
            <label><input type="checkbox" name="spot[]" id="{{$spot->id}}" value="{{$spot->id}}">{{$spot->name}}</label>
        @endforeach

        <p>検索したいキーワードを入力してください。</p>
        <input id="spot" type="text" name="spot">
        @error('spot')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
            
        <label for="newspot" class="fo-si-24"><strong>新規スポット登録</strong></label>
        <p >新規で登録する場合はスポット名を入力してください。</p>
        <input id="newspot" type="text" name="newspot"> <button type="button" class="削除">－</button><br>

        <button type="button" class="追加ボタン">
            <strong>＋追加</strong>
        </button>
    </div>

    <input type="submit" class="登録" value="登録">
        
    </form>


@endsection

@section('footer')
<!--  -->
@endsection