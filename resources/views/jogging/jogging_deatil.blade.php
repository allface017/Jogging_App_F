<div>
        <h2>Jogging Data</h2>
        <p><strong>日時:</strong> {{ $items['date'] }}</p>
        <p><strong>距離:</strong> {{ $items['distance'] }} km</p>
        <p><strong>運動時間:</strong> {{ $items['time'] }}</p>
        <p><img src="{{ asset($items['course']) }}" alt="Product Image" style="max-width: 100px; height: auto;"></p>
        <p><strong>Location:</strong> {{ $items['location'] ? '外' : '中' }}</p>
    </div>
    <div>
        <h2>Spot List</h2>
        <ul>
            @foreach ($spot_list as $spot)
                <li>{{ $spot->spots->name }}</li>
            @endforeach
        </ul>
    </div>