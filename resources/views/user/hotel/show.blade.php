@extends('layouts.user.app')
@section('content')
  @component('components.user.hotel.detail', ['hotel' => $hotel, 'plans' => $plans])
  @endcomponent
  <div class="mx-5">
    <div class="container">
      <section class="">
        <div class="minititle1 text-center">口コミの投稿</div>
          <div class="container">
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
