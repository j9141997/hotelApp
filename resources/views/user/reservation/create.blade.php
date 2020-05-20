@extends('layouts.user.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-body">
                  <form method="POST" action="{{ route('reservation.store', ['hotel' => $hotel->id]) }}">
                      @csrf
                      @method('PATCH')
                      <div class="heading">
                          <h1>会員編集</h1>
                          <p>
                              以下の項目はすべて<span>必須</span>となります。
                          </p>
                      </div>
                      <div class="form-group row register-group">
                          <label for="name" class="">お名前</label>

                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" placeholder="例）吉田純基" autofocus>

                              @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      
                      <div class="form-group row register-group">
                          <label for="postal" class="">郵便番号</label>

                          <div class="col-md-6">
                              <input id="postal" type="text" class="form-control @error('postal') is-invalid @enderror" name="postal" value="{{ $user->postal }}" placeholder="例）1231234" required autocomplete="postal">

                              @error('postal')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row register-group">
                          <label for="address" class="">住所</label>

                          <div class="col-md-6">
                              <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" required placeholder="例）東京都新宿区新宿３丁目１−１３ 京王新宿追分ビル4F"autocomplete="address">

                              @error('address')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row register-group">
                          <label for="tel" class="">電話番号</label>

                          <div class="col-md-6">
                              <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ $user->tel }}" placeholder="例）12312341234" required autocomplete="tel">

                              @error('tel')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row register-group">
                          <label for="birthday" class="">誕生日</label>

                          <div class="col-md-6">
                          <input id="birthday" type="date"  value="{{ date("Y-m-d", strtotime($user->birthday))}}" class="form-control @error('birthday') is-invalid @enderror" name="birthday"  required autocomplete="birthday" max="{{date("Y-m-d")}}">

                              @error('birthday')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row mb-0">
                          <button type="submit" class="confirm-btn">
                              {{ __('登録') }}
                          </button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection