@extends('layouts.user.app')
@section('content')
  <article class="self-container">
      <div class="mx-5">
        <h2 class="ml-5 minititle3">宿を探す</h2></div>

      <section>
        <span class="row ml-5">
          <span class="ml-5 minititle4">宿名で探す</span>
            <form class="" action="/admin/hotel/search/result" method="get">
              <input type="text" class="search1" name="name" size="30" placeholder="宿名を記入してください">
                <span class="ml-5 minititle4">宿タイプで探す</span>
                    <select class="search2" name="type_id">
                      <option value="0">選択して下さい</option>
                      <option value="1">シティホテル</option>
                      <option value="2">リゾートホテル</option>
                      <option value="3">ビジネスホテル</option>
                      <option value="4">旅館</option>
                      <option value="5">民宿</option>
                      <option value="6">ペンション</option>
                    </select>
                <input class="button1 ml-5" type="submit" value="検索する">
            </form>
          </span>
      </section>
  </article>
@endsection
