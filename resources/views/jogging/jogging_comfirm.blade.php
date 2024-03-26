@extends('layouts.mainapp')

@section('title','top')

@section('header')
    
@endsection

@section('content')
    

<p class="top-p">以下の内容で登録が完了しました。</p>
 

 <div class="form">

     <div class="nitizi">
         <p class="fo-si-32">日時</p>

         <p id="nitizi"></p>

     </div>


     <div class="kyori">
         <p class="fo-si-32">距離(km)</p>


         <p id="kyori"></p>

     </div>


     <div class="runtime">
         <p class="fo-si-32">運動時間</p>

         <p id="runtime"></p>

     </div>


     <div class="space">
         <p class="fo-si-32" >運動場所</p>
         <div class="out-in">

             <p id="out">外</p>

             <p id="in">内</p>

         </div>

     </div>


     <div class="jogging-img">
         <p class="fo-si-32">ジョギングコースの画像</p>

         <img src="#" alt="ジョギングコースの画像" id="jogging-img">

     </div>


     <div class="spot">
         <p class="fo-si-32">スポット</p>

         <ul>
             <li>スポットA</li>
         </ul>

     </div>

 </div>


 <div id="return">
     <a href="#">戻る</a>
 </div>

@endsection

@section('footer')
<!--  -->
@endsection