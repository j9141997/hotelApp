@extends('layouts.user.app')


@section('content')
  @component('components.userConfirm', ['user' => $user])
    @slot('section_title') 
      会員情報更新確認
    @endslot

    @slot('form_action')
      更新
    @endslot

    @slot('btn_class')
      edit-btn
    @endslot
  @endcomponent
@endsection
