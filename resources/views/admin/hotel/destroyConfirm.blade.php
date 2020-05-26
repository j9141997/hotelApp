@extends('layouts.admin.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-body">
                  <form method="POST" action="/admin/hotel/{{$form->id}}">
                      @csrf
                      @method('DELETE')
                      <div class="heading">
                          <h1>宿情報の削除</h1>
                          <p>
                              確認が終わりましたら、「削除」ボタンを押してください。
                          </p>
                      </div>
                      <div class="form-group row register-group">
                          <label for="name" class="">宿名</label>
                          <div class="col-md-6">
                            {{ $form->name }}
                          </div>
                      </div>
                      <div class="form-group row register-group">
                          <label for="postal" class="">郵便番号</label>

                          <div class="col-md-6">
                            {{ $form->postal }}
                          </div>
                      </div>
                      <div class="form-group row register-group">
                          <label for="address" class="">住所</label>

                          <div class="col-md-6">
                            {{ $form->address }}
                          </div>
                      </div>
                      <div class="form-group row register-group">
                          <label for="checkin_time" class="">チェックイン</label>
                          <div class="col-md-6">
                            {{ $form->checkin_time }}
                          </div>
                      </div>
                      <div class="form-group row register-group">
                          <label for="checkout_time" class="">チェックアウト</label>
                          <div class="col-md-6">
                            {{ $form->checkout_time }}
                          </div>
                      </div>
                      <div class="form-group row register-group">
                          <label for="type_id" class="">宿タイプ</label>
                          <div class="col-md-6">
                            {{ $form->type->name }}
                          </div>
                      </div>
                      <div class="form-group row register-group">
                          <label for="image" class="">宿写真</label>
                          <div class="col-md-6">
                              <img src="/storage/{{$form->image}}" class="destroy-confirm-img">
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
