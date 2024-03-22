<p>text</p>
<p>{{$total}}</p>
<p>{{$target}}</p>
@foreach($target_list as $item)
    {{$item->id}}<br>
    {{$item->users_id}}<br>
    {{$item->target_distance}}<br>
    {{$item->reward}}<br>

@endforeach