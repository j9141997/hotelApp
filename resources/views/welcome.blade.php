@extends('layouts.user.app')

@section('content')
<div class="container">
  @foreach ($hotels as $hotel)
      <div class="row item-container hotel-list">
      <div class="image-section"><img src="/storage/{{ $hotel->image }}" alt="" class="toppage-image"></div>
        <div class="col-md-9">
          <div class="under">
            <div class="mx-2">
            <span class="toppage-title">{{ $hotel->name }}</span>
            <span class="hoteltype">{{ $hotel->type->name }}</span>
            </div>
          </div>
          <div class="mx-2">〒{{substr($hotel->postal, 0, 3) . '-' . substr($hotel->postal, 3)}}<br>
            {{ $hotel->address }}<br>
          </div>
          <div class="time">
            <div class="checkin-time">
              チェックイン: {{ date("H:i", strtotime($hotel->checkin_time))}}
            </div>
            <div class="checkout-time">
              チェックアウト: {{ date("H:i", strtotime($hotel->checkout_time))}}
            </div>
          </div>
          <p class="to-detail-link">
          <a href="/hotel/{{$hotel->id}}">詳細はこちらから</a> 
          </p>
        </div>
      </div>
  @endforeach
</div>
@endsection