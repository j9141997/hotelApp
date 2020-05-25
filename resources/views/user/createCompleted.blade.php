@extends('layouts.user.app')

@section('content')
<article>
  <section>
  <div class="text-center minititle2">ようこそ{{Auth::user()->name}}さん！</div>
    <div class="text-center minititle2">会員情報登録が完了しました。</div>
  <div class="text-center"><a href="/">トップページへ戻る</a></div>
  </section>
</article>
@endsection
