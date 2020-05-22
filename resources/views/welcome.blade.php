@extends('layouts.user.app')

@section('content')
<div class="container">
  @foreach ($hotels as $hotel)
    <section>
      <div class="row ml-5 item-container hotel-list">
        <div class="col-md-3"><img src="https://fotopus.com/neko/images/top/neko_magazine04.jpg" alt="" class="ml-5"></div>
        <div class="col-md-9 detail">
          <div class="under">
            <div class="mx-2">
            <span class="title">{{ $hotel->name }}</span>
            <span class="hoteltype">{{ $hotel->type->name }}</span>
            </div>
          </div>
          <P class="mx-2">〒{{substr($hotel->postal, 0, 3) . '-' . substr($hotel->postal, 3)}}<br>
            {{ $hotel->address }}<br>
          </p>
          <div class="reservation_day">
            チェックイン: {{ date("H:i", strtotime($hotel->checkin_time))}}
            チェックアウト: {{ date("H:i", strtotime($hotel->checkout_time))}}
          </div>
          <p class="to-detail-link">
          <a href="/hotel/{{$hotel->id}}">詳細はこちらから</a> 
          </p>
        </div>
      </div>
    </section>
  @endforeach
</div>
@endsection