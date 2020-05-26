@extends('layouts.admin.app')

@section('content')
<div class="container">
  <div class="search-keyword">
    <h2 class="minititle3">『{{ $keyword }}』の検索結果</h2>
  </div>
  @if (!$hotels->isEmpty())
    @foreach ($hotels as $hotel)
      <div class="item-container hotel-list">
        <div class="image-section"><img src="/storage/{{ $hotel->image }}" alt="" class="toppage-image"></div>
        <div class="col-md-9 info-section">
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
          <a href="/admin/hotel/{{$hotel->id}}">詳細はこちらから</a> 
          </p>
        </div>
      </div>
    @endforeach
  @else
    <h3 class="no-data">該当する宿はありませんでした。</h3>
  @endif
  {{ $hotels->links() }}
</div>
@endsection

