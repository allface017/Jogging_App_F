<p>ジョギングデータ一覧（TOP）</p>
@foreach($data as $item)
    {{$item['id']}}<br>
    {{$item['date']}}<br>
    {{$item['distance']}}<br>
    {{$item['time']}}<br>
    {{$item['course']}}<br>
    {{$spot_list->posts->name}}
    
@endforeach