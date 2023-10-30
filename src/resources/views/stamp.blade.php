@extends('layouts.app')

@section('content')
    <!-- メインコンテンツ -->
    <section class="table-site">

      <div class="top">
        <h1>
          <p>福場凜太郎さんお疲れ様です！</p>
        </h1>
      </div>

    <div class="archive">
      <div>
          <form action="{{'start_time'}}" method="POST">
          @csrf
          @method('POST')
          <button type="submit" class="btn" name="start_time" {{ session('punchInSuccess') ? 'disabled' : '' }}>勤務開始</button>
          </form>
      </div>
      <div>
          <form action="{{'end_time'}}" method="POST">
          @csrf
          @method('POST')
          <button type="submit" class="btn" name="end_time" {{ session('punchOutSuccess') ? 'disabled' : '' }}>勤務終了</button>
          </form>
      </div>
      <div>
          <form action="{{'breakings_start_time'}}" method="POST">
          @csrf
          @method('POST')
          <button type="submit" class="btn" name="breakings_start_time" {{ session('breakInSuccess') ? '' : 'disabled' }}>休憩開始</button>
          </form>
      </div>
      <div>
          <form action="{{'breakings_end_time'}}" method="POST">
          @csrf
          @method('POST')
          <button type="submit" class="btn" name="breakings_end_time" {{ session('breakOutSuccess') ? '' : 'disabled' }}>休憩終了</button>
          </form>
      </div>
    </div>
      </section>

    <!-- footer -->
    <footer>
      Atte, inc.
    </footer>

@endsection
