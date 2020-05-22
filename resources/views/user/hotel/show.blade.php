@extends('layouts.user.app')
@section('content')
    <article>
      <div class="mx-5">
        <div class="container mx-5">
          <h2 class="ml-5 minititle3">宿の詳細</h2>
            <section>
              <div class="row ml-5 item-container">
                <div class="col-md-3"><img src="https://fotopus.com/neko/images/top/neko_magazine04.jpg" alt="" class="ml-5"></div>
                  <div class="col-md-9 detail">
                    <div class="under">
                      <div class="mx-2 ditail2">
                        <span class="title">{{ $hotel->name }}</span>
                        <span class="hoteltype">{{ $hotel->type->name }}</span>
                      </div>
                    </div>
                    <P class="mx-2">〒{{substr($hotel->postal, 0, 3) . '-' . substr($hotel->postal, 3)}}<br>
                      {{ $hotel->address }}<br>
                    チェックイン: {{ date("H:i", strtotime($hotel->checkin_time))}}　チェックアウト: {{ date("H:i", strtotime($hotel->checkout_time))}}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </section>

      @foreach ($hotel->plans as $plan)
        <div class="mx-5">
          <div class="container mx-5 mb-4">
              <h2 class="ml-5 minititle3">{{ $plan->name }}</h2>
                <section>
                  <div class="under ml-5"></div>
                    <div class="ml-5 text-right">
                      <span class="mr-5 font1">料金　￥{{ $plan->price }}</span>
                      <span class="mr-2 font1">残り{{ $plan->room }}部屋</span>
                      <span class=""><input type="submit" class="button1" value="予約する" onclick="location.href='/plan/{{ $plan->id }}/reservation/create'"></span>
                    </div>
                </section>
          </div>
        </div>
      @endforeach
          <div class="mx-5">
            <div class="container mx-5">
              <section class="row">
                <div class="col-md-2 minititle1 text-center ml-5">口コミ</div>
              </section>

              <section>
                <div class="row ml-5 item-container">
                  <div class="mx-4 py-4">
                    <p>testtesttesttesttesttesttesttesttesttesttesttesttest</p>
                  </div>
                </div>
              </section>
            </div>
          </div>

      <div class="mx-5">
        <div class="container mx-5">
          <section class="row">
            <div class="col-md-2 minititle1 text-center ml-5">口コミの投稿</div>
              <div class="container mx-5">
                <form class="" action="/hotel/{{$hotel->id}}" method="post">
                  @csrf
                  <textarea  name="text" cols="150" rows="5" maxlength="250" class="review-textarea"></textarea>
                  <div class="text-right">
                  <button class="button1" type="submit">投稿する</button>
                </form>
                </div>
              </div>
            </div>
          </div>
      </section>
    </article>
  @endsection
