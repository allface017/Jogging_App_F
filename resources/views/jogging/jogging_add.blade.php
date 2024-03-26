@extends('layouts.layout')

@section('title','top')

@section('header')

@endsection


@section('content')
<form action="" method="post" class="form">



        <div class="日時">
            <label for="nitizi"><strong class="fo-si-32">日時</strong></label><br>

           
                <input id="nitizi" type="date"  name="date" required>

                @error('date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            
        </div>



        <div class="距離">
            <label for="kyori" ><strong class="fo-si-32">距離(km)</strong></label><br>

            
                <input id="kyori" type="text"  name="kyori" required>

                @error('kyori')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            
        </div>



        <div class="運動時間">
            <label for="time" ><strong class="fo-si-32">運動時間</strong></label><br>

            <div class="テキストボックス">
                <input id="hh" type="text" class="ma-ri-24" name="hh" placeholder="hh" required> <span
                    class="ma-ri-24">:</span>
                <input id="mm" type="text" class="ma-ri-24" name="mm" placeholder="mm" required> <span
                    class="ma-ri-24">:</span>
                <input id="ss" type="text" class="ma-ri-24" name="ss" placeholder="ss" required>

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

                <input type="radio" name="s2" id="out" value="外" checked="">

                <label for="out" class="switch-out ">外</label>

                <input type="radio" name="s2" id="in" value="内">

                <label for="in" class="switch-in ">内</label>

            </div>

        </div>


        <br>
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
            <ul>
                    <li>スポットA</li>
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