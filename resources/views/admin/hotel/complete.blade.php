@extends('layouts.admin.app')


@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header complete-header">
                <h1>宿情報登録 完了画面</p>
              </div>
              <div class="card-body complete-body">
                  <div class="complete-section">
                    <div class="complete-title">
                      <label for="" class="data-title">名前</label>
                      <p>{{ $hotel->name }}</p>
                    </div>
                    <div class="complete-title">
                      <label for="" class="data-title">郵便番号</label>
                      <p>{{ $hotel->postal }}</p>
                    </div>
                    <div class="complete-title">
                      <label for="" class="data-title">住所</label>
                      <p>{{ $hotel->address }}</p>
                    </div>
                    <div class="complete-title">
                      <label for="" class="data-title">チェックイン時間</label>
                      <p>{{ $hotel->checkin_time }}</p>
                    </div>
                    <div class="complete-title">
                      <label for="" class="data-title">チェックアウト時間</label>
                      <p>{{ $hotel->checkout_time }}</p>
                    </div>
                    <div class="complete-title">
                      <label for="" class="data-title">宿タイプ</label>
                      <p>{{ $hotel->type_id }}</p>
                    </div>
                    <div class="complete-title">
                      <label for="" class="data-title">宿写真</label>
                      <p>{{ $hotel->image }}</p>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
