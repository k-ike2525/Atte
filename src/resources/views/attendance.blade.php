@extends('layouts.app')

@section('content')
  <section  class="site-width" >
    <!-- ページネーション -->
    <div>
        <div class="today">
            <span class="list-item-today"><a href="{{ route('attendance.index', ['date' => $previousDate]) }}">&lt;</a></span>
            @if (!empty($items) && !empty($items[0]))
                <span id="view_today">
                    {{ $items[0]['created_at'] }}
                </span>
            @endif
            <span class="list-item-today"><a href="{{ route('attendance.index', ['date' => $nextDate]) }}">&gt;</a></span>
        </div>
    </div>
        
        <!-- （仮説中）勤怠テーブル -->
    <div class="table">
      <table class="my-parts">
        <tr>
          <th>名前</th>
          <th>勤務開始</th>
          <th>勤務終了</th>
          <th>休憩時間</th>
          <th>勤務時間</th>
        </tr>

        @foreach ($items as $item)
        <tr>
            <td>{{ $item['user']->name }}</td>
            <td>{{ $item['work']['start_time'] }}</td>
            <td>{{ $item['work']['end_time'] }}</td>
            <td>{{ $item['breaktotal'] }}</td>
            <td>{{ $item['workstotal'] }}</td>
        </tr>
        @endforeach      
        </table>
    </div>

    <!-- ページネーション -->
       <div>
        <div class="pagination">
          <ul class="pagination-list">
            <li class="list-item">
            {{ $items->links() }}
            </li>
          </ul>
        </div>
       </div>



      </section>

    <!-- footer -->
    <footer>
      Atte, inc.
    </footer>
@endsection
