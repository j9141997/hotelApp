@extends('layouts.user.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-body">
                  <form method="POST" action="{{ route('reservation.store', ['hotel' => $hotel_id, 'plan' => $plan->id]) }}">
                      @csrf
                      <div class="heading">
                          <h2>宿の予約</h2>
                          <p>
                              以下の項目はすべて<span>必須</span>となります。<br>
                              入力が終わりましたら、「予約する」ボタンを押してください。
                          </p>
                      </div>
                      <div class="form-group row register-group">
                        <label for="reservation-hotel" class="">宿泊先</label>
                        <div class="col-md-6">
                            {{ $plan->hotel->name }}
                        </div>
                      </div>
                      <div class="form-group row register-group">
                        <label for="reservation-plan" class="">宿泊プラン</label>
                        <div class="col-md-6">
                            {{ $plan->name }}
                        </div>
                      </div>
                      <div class="form-group row register-group">
                          <label for="checkin_day" class="">チェックイン</label>
                          <div class="col-md-6">
                              <input id="checkin_day" type="date" class="form-control @error('checkin_day') is-invalid @enderror" name="checkin_day" value="{{ old('checkin_day', date('Y-m-d', strtotime('+1 day'))) }}" required autocomplete="checkin_day" min="{{date('Y-m-d', strtotime('+1 day'))}}" max="{{date('Y-m-d', strtotime('+1 year'))}}" autofocus>
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
                            <input id="checkout_day" type="date" class="form-control @error('checkout_day') is-invalid @enderror" name="checkout_day" value="{{ old('checkout_day', date('Y-m-d', strtotime('+2 day'))) }}" required autocomplete="checkout_day" min="{{date('Y-m-d', strtotime('+2 day'))}}" max="{{date('Y-m-d', strtotime('+1 year'))}}">
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
                            <input id="count" type="number"  onchange="getCount(value, {{$plan->countRoom($this)}})" class="form-control @error('count') is-invalid @enderror" name="count" value="{{ old('count', 1) }}" required autocomplete="count" min="1" max="{{ $plan->countRoom($this)}}">室
                                @error('count')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <p>※残り<span id="roomcount">{{ $plan->countRoom($this) - 1}}</span>室です。</p>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <button type="submit" class="confirm-btn">
                            予約する
                        </button>
                    </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
