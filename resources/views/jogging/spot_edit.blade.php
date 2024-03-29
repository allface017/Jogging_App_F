@extends('layouts.layout')

@section('title','Spot_edit')
@section('head')
<link rel="stylesheet" href="/css/jogging_list.css">
<script async src="/js/jogging_recommendation.js"></script>
@endsection
@section('header')

    
@endsection

@section('content')
@if ($add_message)
        <h1>{{ $add_message }}</h1>
@endif
    
<h1>新規スポット登録</h1>
<p>新規で登録する場合はスポット名を入力してください。</p>
<form action="{{ route('jogging.spot_create') }}" method="post">
@csrf
<input type="text" name="name">
<button type="submit">追加</button>
</form>

@if ($edit_message)
        <h1>{{ $edit_message }}</h1>
    @endif

<h1>スポット一覧</h1>
<p>検索したいキーワードを入力してください。</p>
<form action="{{ route('jogging.spot_serach')}}" method="post">
    @csrf
    <input type="text" name="key_name">
    <button type="submit">検索</button>
</form>

@if ($key_name)
        <h1>スポット検索結果</h1>
        <p>検索キーワード: {{ $key_name }}</p>
    @endif
<table>
        <thead>
            <tr>
                <th>名前</th> 
                <th>編集</th>
                <th>経由数</th>
            </tr>
        </thead>
        <tbody>
        @foreach($spots as $spot)
        <tr>
            <td>
                <form action="{{ route('jogging.spot_edit')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$spot->id }}">
                    <input type="text" name="name" value="{{ $spot->name }}">
                    <button type="submit">更新</button>
                </form>
            </td>
            <td><p>経由数:{{ $spotCounts[$spot->id] }}</p></td>
        </tr>
    @endforeach 
        </tbody>
    </table>

@endsection

@section('footer')
<!--  -->
@endsection