@extends('layouts.user.app')

@section('content')
  @component('components.userConfirm', ['user' => $user])
    @slot('section_title')
      会員登録
    @endslot

    @slot('form')
      <form action="{{ route('user.register') }}" method="post" class="confirm-form">
        @csrf
        <input type="submit" class="confirm-btn create-btn" value="登録">
        <br>
        <a href="/" class="confirm-btn back-btn">戻る</a>
      </form>
     @endslot
  @endcomponent
@endsection