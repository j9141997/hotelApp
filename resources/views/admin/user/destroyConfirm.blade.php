@extends('layouts.admin.app')

@section('content')
  @component('components.userConfirm', ['user' => $user])
  @slot('section_title')
    会員削除確認
  @endslot

  @slot('btn_class')
    delete-btn
  @endslot

  @slot('form')
    <form action="{{ route('admin.user.destroy', ['user' => $user->id]) }}" method="POST" class="confirm-form">
      @method('DELETE')
      @csrf
      <input type="submit" class="confirm-btn delete-btn" value="削除">
    </form>
    <button onclick="location.href='/admin/home'" class="confirm-btn back-btn">戻る</button>
  @endslot
  @endcomponent
@endsection