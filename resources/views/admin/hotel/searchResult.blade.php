@extends('layouts.user.app')
@section('content')
    <article class="self-container">
      <div class="container mx-5">
        <h2 class="ml-5 minititle3">『{{$in_msg}}』の検索結果</h2>
        @if(!$hotels->isEmpty())
        @foreach($hotels as $hotel)
        <div class="row ml-5 item-container">
          <div class="col-md-3"><img src="/storage/{{$hotel->image}}" alt="" class="ml-5"></div>
          <div class="col-md-9 detail">
            <div class="under">
              <div class="mx-2 ditail2">
                <span class="title">{{$hotel->name}}</span>
                <span class="hoteltype">{{$type_name}}</span>  {{--宿タイプをもってきたい--}}
              </div>
            </div>
            <span class="mx-2">{{'〒' . substr($hotel->postal, 0, 3) . '-' . substr($hotel->postal, 3)}}<br>
              {{$hotel->address}}<br>
              チェックイン　{{substr($hotel->checkin_time, 0, 5)}}　チェックアウト　{{substr($hotel->checkout_time, 0, 5)}}</span>
              <span class=""><input type="submit" class="button1" value="予約する" onclick="location.href='/'"></span>
          </div>
        </div>
        @endforeach
        @else
        <p>該当するホテルはありませんでした。</p>
        @endif
      </div>
    </article>
@endsection
