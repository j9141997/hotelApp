@extends('layouts.admin.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/admin/hotel" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="heading">
                            <h1>宿登録</h1>
                            <p>
                                以下の項目はすべて<span>必須</span>となります。<br>
                                入力が終わりましたら、「登録する」ボタンを押してください。
                            </p>
　　　　　　　　　　　　　　　@if(count($errors) > 0)
    　　　　　　　　　　　　　　<p><span>入力に問題があります。再入力してください。</span></p>
  　　　　　　　　　　　　　　@endif
                        </div>
                        <div class="form-group row register-group">
                            <label for="name" class="">宿名</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required autocomplete="name" placeholder="例）吉田旅館" autofocus>

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
                                <input id="postal" type="text" class="form-control @error('postal') is-invalid @enderror" name="postal" value="{{ old('postal') }}" required autocomplete="postal" placeholder="例）1231234">
                                <p>※ハイフンを入れずに入力してください</p>

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
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required placeholder="例）東京都千代田区千代田１－１１" >

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row register-group">
                            <label for="checkin_time" class="">チェックイン</label>

                            <div class="col-md-6">
                                <input id="checkin_time" type="time" class="form-control @error('checkin_time') is-invalid @enderror" name="checkin_time" value="{{ old('checkin_time') }}" required>

                                @error('checkin_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row register-group">
                            <label for="checkout_time" class="">チェックアウト</label>

                            <div class="col-md-6">
                                <input id="checkout_time" type="time" class="form-control @error('checkout_time') is-invalid @enderror" name="checkout_time" value="{{ old('checkout_time') }}" required>

                                @error('checkout_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row register-group">
                            <label for="type_id" class="">宿タイプ</label>

                            <div class="col-md-6">
                                <select id="type_id" class="form-control @error('type_id') is-invalid @enderror" name="type_id"  value="{{ old('type_id') }}" required>
                                  <option value="1">シティホテル</option>
                                  <option value="2">リゾートホテル</option>
                                  <option value="3">ビジネスホテル</option>
                                  <option value="4">旅館</option>
                                  <option value="5">民宿</option>
                                  <option value="6">ペンション</option>
                                </select>

                                @error('type_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row register-group">
                            <label for="image" class="">宿写真</label>

                            <div class="col-md-6">
                                <input id="image" type="file" accept="image/*" name="image" value="{{old('image')}}" required>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {{--@error('image')
                                   {{$message}}
                                @enderror--}}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <button type="submit" class="complete-btn">
                                {{ __('登録する') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
