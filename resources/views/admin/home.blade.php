@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body admin-home">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="user/search/input" class="admin-btn">会員検索</a>
                    <br>
                    <a href="hotel/search/input" class="admin-btn">宿を検索</a>
                    <br>
                    <a href="/admin/home" class="admin-btn">宿登録</a>
                    <br>
                    <a href="/admin/home" class="admin-btn">宿泊プラン登録</a>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

@if (session('msg') !== null)
  <p> {{session('msg')}} </p>
@endif

@endsection
