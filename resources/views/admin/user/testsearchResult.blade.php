@extends('layouts.admin.app')

{{--同じ名前の人がいる場合の処理がわからない--}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                        <div class="heading">
                            <h1>会員検索結果</h1>
                        </div>
                        @if(!isset($users))
                        <p>存在しない会員です</p>
                        @endif
                        @foreach($users as $user)
                        <div class="form-group row register-group">
                            <label for="user_name" class="">会員名</label>

                            <div class="col-md-6">
                                <p id="user_name">{{$user->name}}</p>
                            </div>
                        </div>

                        <div class="form-group row register-group">
                            <label for="postal" class="">郵便番号</label>

                            <div class="col-md-6">
                                <p id="postal">{{$user->postal}}</p>
                            </div>
                        </div>

                        <div class="form-group row register-group">
                            <label for="address" class="">住所</label>

                            <div class="col-md-6">
                                <p id="address">{{$user->address}}</p>
                            </div>
                        </div>

                        <div class="form-group row register-group">
                            <label for="tel" class="">電話番号</label>

                            <div class="col-md-6">
                                <p id="tel">{{$user->tel}}</p>
                            </div>
                        </div>

                        <div class="form-group row register-group">
                            <label for="email" class="">メールアドレス</label>

                            <div class="col-md-6">
                                <p id="email">{{$user->email}}</p>
                            </div>
                        </div>

                        <div class="form-group row register-group">
                            <label for="birthday" class="">誕生日</label>

                            <div class="col-md-6">
                                <p id="birthday">{{$user->birthday}}</p>
                            </div>
                        </div>
                        @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
