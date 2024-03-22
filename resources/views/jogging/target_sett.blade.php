<p>目標設定</p>
<p for="file">目標距離:{{ $target->target_distance}} km</p>
<progress id="file" min="0" max="{{ $target->target_distance}}" value="{{ $total }}"></progress><br>
<p>次の目標まであと{{$total - $target->target_distance}}km</p>
<p>現在:{{$total}}km</p>


    @foreach($target_list as $item)
        <table> 
            <th>

            </th>
            </table>
        {{$item->target_distance}}<br>
        {{$item->reward}}<br>
    @endforeach
    <form action="{{ route('jogging.target_add') }}" method="POST">
        @csrf
        <label for="target_distance">目標距離 (km):</label><br>
        <input type="number" id="target_distance" name="target_distance" step="0.01" required><br>
        
        <label for="reward">ご褒美:</label><br>
        <input type="text" id="reward" name="reward" required><br>
        
        <button type="submit">追加</button>
    </form>