@extends('layouts.user.app')
@section('content')
    <article class="self-container">
      <div class="container mx-5">
        <h2 class="ml-5 minititle3">『{{ $keyword }}』の検索結果</h2>
        @if(!$hotels->isEmpty())
          @foreach($hotels as $hotel)
           <div class="row ml-5 item-container">
             <div class="col-md-3"><img src="/storage/{{$hotel->image}}" alt="" class="ml-5"></div>
             <div class="col-md-9 detail">
               <div class="under">
                 <div class="mx-2 ditail2">
                   <span class="title">{{ $hotel->name }}</span>
                   <span class="hoteltype">{{ $hotel->type->name }}</span>
                 </div>
               </div>
               <span class="mx-2">{{'〒' . substr($hotel->postal, 0, 3) . '-' . substr($hotel->postal, 3)}}<br>
                 {{ $hotel->address }}
               <br>
                 チェックイン　{{ date("H:i", strtotime($hotel->checkin_time)) }}　　チェックアウト　{{ date("H:i", strtotime($hotel->checkout_time)) }}</span>
                 <span class=""><input type="submit" class="button1" value="詳細はこちら" onclick="location.href='/hotel/{{$hotel->id}}'"></span>
             </div>
           </div>
          @endforeach
        @else
          <h3 class="no-data">該当する宿はありませんでした。</h3>
        @endif
      </div>
    </article>
@endsection
