@extends('layouts.user.app')

@section('content')
  @component('components.userConfirm', ['user' => $user])
    @slot('section_title') 
      会員情報更新確認
    @endslot

    @slot('form')
      <form action="{{route('admin.user.update', ['user' => $user->id])}}" method="post" class="confirm-form">
        @csrf
        @method('PATCH')
        <input type="submit" class="confirm-btn edit-btn" value="更新">
        <br>
        <a href="/" class="confirm-btn back-btn">戻る</a>
      </form>
    @endslot
  @endcomponent
@endsection
