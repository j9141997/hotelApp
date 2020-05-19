@extends('layouts.user.app')

@section('content')
  @component('components.userConfirm', ['user' => $user])
    @slot('section_title')
      会員退会確認
    @endslot

    @slot('form_action')
      退会
    @endslot

    @slot('btn_class')
      delete-btn
    @endslot

    @slot('form')
      <form action="{{ route('user.destroy') }}" method="post" class="confirm-form">
        @method('DELETE')
        @csrf
        <input type="submit" class="confirm-btn delete-btn" value="退会">
        <br>
        <a href="/" class="confirm-btn back-btn">戻る</a>
      </form>
    @endslot
  @endcomponent
@endsection