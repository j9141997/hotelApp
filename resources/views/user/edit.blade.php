@extends('layouts.user.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
            <div class="card-header confirm-header">
              会員情報更新
              </div>

              <div class="card-body">
                  <form method="POST" action="{{ route('user.update', ['user' => $user->id]) }}">
                      @csrf
                      @method('PATCH')
                      <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>

                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                              @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      
                      <div class="form-group row">
                          <label for="postal" class="col-md-4 col-form-label text-md-right">郵便番号</label>

                          <div class="col-md-6">
                              <input id="postal" type="text" class="form-control @error('postal') is-invalid @enderror" name="postal" value="{{ $user->postal }}" required autocomplete="postal">

                              @error('postal')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="address" class="col-md-4 col-form-label text-md-right">住所</label>

                          <div class="col-md-6">
                              <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" required autocomplete="address">

                              @error('address')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="tel" class="col-md-4 col-form-label text-md-right">電話番号</label>

                          <div class="col-md-6">
                              <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ $user->tel }}" required autocomplete="tel">

                              @error('tel')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="birthday" class="col-md-4 col-form-label text-md-right">誕生日</label>

                          <div class="col-md-6">
                          <input id="birthday" type="date"  class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ $user->birthday }}" required autocomplete="birthday" max="{{date("Y-m-d")}}">

                              @error('birthday')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('更新') }}
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection