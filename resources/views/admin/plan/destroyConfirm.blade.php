{{-- @extends('layouts.admin.app')
     admin用のフッターができたら上のやつに戻す --}}
@extends('layouts.user.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-body">
                  <form method="POST" action="/admin/plan/{{ $form->id }}">
                      @csrf
                      @method('DELETE')
                      <div class="heading">
                          <h1>宿泊プラン情報の削除</h1>
                          <p>
                              確認が終わりましたら、「削除」ボタンを押してください。
                          </p>
                      </div>
                      <div class="form-group row register-group">
                          <label for="name" class="">ホテルID</label>
                          <div class="col-md-6">
                            {{ $form->hotel_id }}
                          </div>
                      </div>
                      <div class="form-group row register-group">
                          <label for="postal" class="">プラン名</label>
                          <div class="col-md-6">
                            {{ $form->name }}
                          </div>
                      </div>
                      <div class="form-group row register-group">
                          <label for="address" class="">料金</label>
                          <div class="col-md-6">
                            {{ $form->price }}
                          </div>
                      </div>
                      <div class="form-group row register-group">
                          <label for="checkin_time" class="">部屋数</label>
                          <div class="col-md-6">
                            {{ $form->room }}
                          </div>
                      </div>
                      <div class="form-group row register-group">
                          <label for="checkout_time" class="">チェックアウト</label>
                          <div class="col-md-6">
                            {{ $form->checkout_time }}
                          </div>
                      </div>
                      <div class="form-group row mb-0">
                          <button type="submit" class="complete-btn delete-btn">
                              削除する
                          </button>
                      </div>
                  </form>
                  <div class="row mb-0">
                    <button onclick="location.href='/admin/hotel/{{ $form->id }}'" class="complete-btn back-btn">戻る</button>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection