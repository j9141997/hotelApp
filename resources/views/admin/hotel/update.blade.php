@extends('layouts.admin.app')
@section('content')
    <article>
      <section>
        <div class="text-center minititle2">宿情報編集完了</div>
        <div class="text-center"><a href="/admin/hotel/{{ $hotel_id }}">宿詳細画面へ戻る</a></div>
      </section>
    </article>
  </body>
</html>
@endsection
