@extends('layouts.user.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body user-results">
          <div class="heading">
          <h2>『{{ $input }}』の検索結果</h2>
            {{-- <h2>{{ $input }}の検索結果</h2> --}}
          </div>
          @if (isset($users))
            @foreach ($users as $user)
              <div class="user-result">
                <div class="user-data">
                  ID: {{ $user->id }}
                  <br>
                  名前: {{ $user->name }}
                </div>
                <button class="to-detail" onclick="location.href='/admin/user/{{ $user->id }}'">詳細</button>
              </div>
            @endforeach
          @else
            <h3 class="no-data">『{{ $input }}』は存在しません。</h3>
          @endif

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
