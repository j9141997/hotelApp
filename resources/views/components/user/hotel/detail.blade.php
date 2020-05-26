<article class="main-content">
  <div class="mx-5">
    <div class="container">
        <section>
          <div class="row item-content">
            <div class="col-md-3"><img src="/storage/{{ $hotel->image }}" alt="" class="detail-img"></div>
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
      @foreach ($plans as $plan)
        <div class="mx-5">
          <div class="container">
              <div class="minititle3">{{ $plan->name }}</div>
                <section>
                  <div class="under"></div>
                    <div class="plan-detail">
                      <div class="detail-price">料金: ￥{{ $plan->price }}</div>
                      @if ($plan->countRoom($plan) <= 0)
                        <input type="submit" class="blue-btn to-reservationBtn full-btn" value="満室" onclick="location.href='/plan/{{ $plan->id }}/reservation/create'" disabled>
                      @else
                        <div class="detail-remaining">残り{{ $plan->countRoom($plan) }}部屋</div>
                        <input type="submit" class="blue-btn to-reservationBtn" value="予約する" onclick="location.href='/plan/{{ $plan->id }}/reservation/create'">
                      @endif
                    </div>
                </section>
          </div>
        </div>
      @endforeach
      <div class="mx-5">
        <div class="container">
          <section>
          <div class="minititle1 text-center">{{ count($hotel->reviews)}}件の口コミ</div>
          </section>
        <div class="container">
          <section >
            <div class="item-container review-lists">
              <div class="mx-4 py-4">
                @if (!$hotel->reviews->isEmpty())
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
                @else
                  口コミがまだありません
                @endif
              </div>
            </div>
          </section>
        </div>
        </div>
      </div>