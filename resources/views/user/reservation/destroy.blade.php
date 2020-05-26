@extends('layouts.user.app')
@section('content')
    <article>
      <section>
        <div class="text-center minititle2">ご予約のキャンセルが完了しました</div>
        <div class="text-center">またのご利用をお待ちしております。</div>
      <div class="text-center"><a href="{{'/user/' . Auth::id() . '/reservationlist'}}">予約履歴へ戻る</a></div>
      </section>
    </article>
  </body>
</html>
@endsection
