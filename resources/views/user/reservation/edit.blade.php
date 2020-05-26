@extends('layouts.user.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-body">
                  <form method="POST" action="{{ route('reservation.update', ['plan' => $plan_id, 'reservation' => $reservation->id]) }}">
                      @csrf
                      @method('PATCH')
                      <div class="heading">
                          <h2>宿の予約変更</h2>
                          <p>
                              以下の項目はすべて<span>必須</span>となります。<br>
                              入力が終わりましたら、「予約する」ボタンを押してください。
                          </p>
                      </div>
                      <div class="form-group row register-group">
                        <label for="reservation-hotel" class="">宿泊先</label>
                        <div class="col-md-6">
                            {{ $reservation->plan->hotel->name }}
                        </div>
                      </div>
                      <div class="form-group row register-group">
                        <label for="reservation-plan" class="">宿泊プラン</label>
                        <div class="col-md-6">
                            {{ $reservation->plan->name }}
                        </div>
                      </div>
                      <div class="form-group row register-group">
                          <label for="checkin_day" class="">チェックイン</label>
                          <div class="col-md-6">
                              <input id="checkin_day" type="date" class="form-control @error('checkin_day') is-invalid @enderror" name="checkin_day" value="{{ date("Y-m-d", strtotime($reservation->checkin_day )) }}" required autocomplete="checkin_day" min="{{date('Y-m-d', strtotime('+1 day'))}}" max="2022-9-14" autofocus>
                              @error('checkin_day')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group row register-group">
                        <label for="checkout_day" class="">チェックアウト</label>
                        <div class="col-md-6">
                            <input id="checkout_day" type="date" class="form-control @error('checkout_day') is-invalid @enderror" name="checkout_day" value="{{  date("Y-m-d", strtotime($reservation->checkout_day )) }}" required autocomplete="checkout_day" min="{{date('Y-m-d', strtotime('+2 day'))}}" max="2022-9-14" autofocus>
                            @error('checkout_day')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row register-group">
                        <label for="count" class="">部屋数</label>
                        <div class="col-md-6">
                            <div class="room-input">
                                <input id="count" type="number" onchange="getCount(value, {{$reservation->plan->countRoom($this) + $reservation->count}})" class="form-control @error('count') is-invalid @enderror" name="count" value="{{ $reservation->count }}" required autocomplete="count" min="1" max="{{ $reservation->plan->countRoom($this) + $reservation->count }}" autofocus>室
                                @error('count')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          <p>※残り<span id="roomcount">{{ $reservation->plan->countRoom($this) + $reservation->count }}</span>室です。</p>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{$reservation->id}}">
                    <div class="form-group row mb-0">
                        <button type="submit" class="confirm-btn">
                            {{ __('予約変更する') }}
                        </button>
                    </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
