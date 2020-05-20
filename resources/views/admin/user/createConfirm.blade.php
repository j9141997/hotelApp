@extends('layouts.user.app')

@section('content')
  @component('components.confirm')
    @slot('section_title')
      会員登録
    @endslot

    @slot('form_action')
      登録
    @endslot
  @endcomponent
@endsection

