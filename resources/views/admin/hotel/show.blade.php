@extends('layouts.admin.app')
@section('content')
  @component('components.admin.hotel.detail', ['hotel' => $hotel, 'plans' => $plans])
  @endcomponent
  @endsection
