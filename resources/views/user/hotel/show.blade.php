@extends('layouts.user.app')
@section('content')
{{-- <div class="card-body content">
  <div class="content-header">
    <div class="left-content">
      <img src="https://r-cf.bstatic.com/images/hotel/max1024x768/163/163241930.jpg" alt="" class="detail-img">
    </div>
    <div class="right-content">
      <div class="detail-title">
        <h2>{{ $hotel->name }}</h2>
        <div class="hotel-type">
          {{ $hotel->type->name }}
        </div>
      </div>
    </div>
  </div>
</div> --}}
<article class="main-content">
  <div class="mx-5">
    <div class="container mx-5">
      <h2 class="ml-5 minititle3">宿の詳細</h2>
        <section>
          <div class="row mx-5 item-content">
            <div class="col-md-3">      <img src="https://r-cf.bstatic.com/images/hotel/max1024x768/163/163241930.jpg" alt="" class="detail-img"></div>
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
              <div class="under mx-5"></div>
                <div class="plan-detail">
                  <div class="detail-price">料金: ￥{{ $plan->price }}</div>
                  <div class="detail-remaining">残り{{ $plan->room }}部屋</div>
                  <input type="submit" class="blue-btn to-reservationBtn" value="予約する" onclick="location.href='/plan/{{ $plan->id }}/reservation/create'">
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
            <div class="row mx-5 item-container">
              <div class="mx-4 py-4">
                @foreach ($hotel->reviews as $review)
                  <div class="review">
                    <div class="review-user">
                      {{ $review->user->name }}
                    </div>
                    <div class="review-text">
                      {{ $review->text }}
                    </div>
                  </div>
                @endforeach
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
              <textarea  name="text" cols="150" rows="5" maxlength="250" class="review-textarea" placeholder="この場所での自分の体験や感想を共有しましょう"></textarea>
              <div class="text-right">
              <button class="blue-btn review-btn" type="submit">投稿する</button>
            </form>
            </div>
          </div>
        </div>
      </div>
  </section>
</article>
  @endsection
