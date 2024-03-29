@extends('layouts.layout')

@section('title','top')
@section('head')
<link rel="stylesheet" href="/css/jogging_list.css">
@endsection
@section('header')
    
@endsection

@section('content')

@if($message)
    <h2>{{ $message }}</h2>
@endif

@if(isset($target) && isset($target->target_distance)) 
    <p>目標設定</p>
    <progress id="file" min="0" max="{{ $target->target_distance}}" value="{{ $total }}"></progress><br>
    <p>次の目標まであと{{$total - $target->target_distance}}km</p>
    <p>現在:{{$total}}km</p>
@endif

@if(isset($target_list))
    <table>
        <tr>
            <th>名前</th> 
            <th>編集</th>

        </tr>
        @foreach($target_list as $item)
            <tr>
                <td>{{$item->target_distance}}</td>
                <td>{{$item->reward}}</td>
            </tr>
        @endforeach
    </table>
@endif

    <form action="{{ route('jogging.target_add') }}" method="POST">
        @csrf
        <label for="target_distance">目標距離 (km):</label><br>
        <input type="number" id="target_distance" name="target_distance" step="0.01" required><br>
        
        <label for="reward">ご褒美:</label><br>
        <input type="text" id="reward" name="reward" required><br>
        
        <button type="submit">追加</button>
    </form>

    @endsection

@section('footer')
<!--  -->

@endsection