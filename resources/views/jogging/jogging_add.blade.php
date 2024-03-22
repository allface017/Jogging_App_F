@extends('layouts.mainapp')

@section('title','top')

@section('header')

@endsection


@section('content')

<div class="">
    <label for="nitizi" class=""><strong>日時</strong></label><br>

    <div class="">
        <input id="nitizi" type="date" class="" name="date" required>

        @error('date')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>



<div class="">
    <label for="kyori" class=""><strong>距離(km)</strong></label><br>

    <div class="">
        <input id="kyori" type="text" class="" name="kyori" required>

        @error('kyori')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>



<div class="">
    <label for="time" class=""><strong>運動時間</strong></label><br>

    <div class="">
        <input id="hh" type="text" class="" name="hh" required> <span>:</span>
        <input id="mm" type="text" class="" name="mm" required> <span>:</span>
        <input id="ss" type="text" class="" name="ss" required>

        @error('time')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>



<div class="">
    <label for="place" class=""><strong>運動場所</strong></label><br>

        <div class="">
            <div>
                <span>
                    <label for="out">外</label>
                    <input id="out" type="radio" class="" name="place" value="外" checked>
                </span>

                <span>
                    <label for="in">内</label>
                    <input id="in" type="radio" class="" name="place" value="内">
                </span>

            </div>

        </div>
    
</div>


<div class="">
    <label for="jogging" class=""><strong>ジョギングコースの画像の添付</strong></label><br>

    <div class="">
        <input id="jogging" type="file" class="" name="jogging">


        @error('jogging')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>



<div class="">
    <label for="spot" class=""><strong>スポット</strong></label><br>

    <div class="">
        <ul>
            <li></li>
            <li></li>
        </ul>

        <p>検索したいキーワードを入力してください。</p>
        <input id="spot" type="text" class="" name="spot">


        @error('spot')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>


    <label for="newspot" class=""><strong>新規スポット登録</strong></label>
    <p>新規で登録する場合はスポット名を入力してください。</p>
    <input id="newspot" type="text" class="" name="newspot"> <button type="button" class="">－</button><br>

    <button type="button" class="">
        ＋追加
    </button>
</div>



<button type="submit" class="">
    登録
</button>

@endsection

@section('footer')
<!--  -->
@endsection