@extends('layouts.layout')

@section('title','top')
@section('head')
<link rel="stylesheet" href="/css/jogging_list.css">
@endsection
@section('header')

    
@endsection

@section('content')
<div class="graph-div">
    
    <div class="score-div flex">
        <div class="total-score flex">
            <p>総合</p>
            <div class="score-data flex">
                <div class="score-data-value">
                <p>1110.4km</p>
                <p>113:40:00</p>
                </div>
                <div>
                    <p>(距離)</p>
                    <p>(運動時間)</p>
                </div>    
            </div>
        </div>
        <div class="month-score flex">           
            <p>今月</p>
            <div class="score-data flex">
                <div class="score-data-value">
                <p>50.4km</p>
                <p>1:40:00</p>
                </div>
                <div>
                    <p>(距離)</p>
                    <p>(運動時間)</p>
                </div>
            </div>
        </div>
    </div>

    <div class="search-menu flex">
        <a href="#" id="registration-order">登録順</a>
        <a href="#" id="">昇順</a>
    </div>

    <ul>
        <li>
            <div class="graph-data flex">
                <p>20xx月</p>
                <div class="flex">
                    <p>100.25km</p>
                    <p>(距離)</p>
                </div>
                <div class="flex">
                    <p>111:23:00</p>
                    <p>(運動時間)</p>
                </div>
            </div>
            <div class="graph"></div>
         </li>
    </ul>

</div>

@endsection

@section('footer')
<!--  -->

@endsection