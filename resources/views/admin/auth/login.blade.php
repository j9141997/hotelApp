@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf
                        <div class="heading login-heading">
                            <h2>管理者ログイン</h2>
                        </div>
                        <div class="form-group row register-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="admin@example.com" required autocomplete="email" placeholder="メールアドレス" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row register-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required  placeholder="パスワード" autocomplete="current-password" value="111111">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row mb-0 user-btn register-group">
                            <input type="submit" value="ログイン" class="confirm-btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection