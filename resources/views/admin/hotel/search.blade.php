@extends('layouts.admin.app')
@section('content')
    <article class="self-container">
      <div class="container mx-5">
        <h2 class="ml-5 minititle3">『{{ $keyword }}』の検索結果</h2>
        @foreach($hotels as $hotel)
         <div class="row ml-5 item-container">
           <div class="col-md-3"><img src="https://fotopus.com/neko/images/top/neko_magazine04.jpg" alt="" class="ml-5"></div>
           <div class="col-md-9 detail">
             <div class="under">
               <div class="mx-2 ditail2">
                 <span class="title">{{ $hotel->name }}</span>
                 <span class="hoteltype">{{ $hotel->type->name }}</span>
               </div>
             </div>
             <span class="mx-2">〒{{ $hotel->postal}}<br>
               {{ $hotel->address }}
             <br>
               チェックイン:{{ date("H:i", strtotime($hotel->checkin_time)) }}　　チェックアウト:{{ date("H:i", strtotime($hotel->checkout_time)) }}</span>
               <span class=""><input type="submit" class="button1" value="詳細はこちら" onclick="location.href='/admin/hotel/{{$hotel->id}}'"></span>
           </div>
         </div>
        @endforeach
    </article>
@endsection
