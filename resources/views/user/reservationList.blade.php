@extends('layouts.user.app')

@section('content')
<div class="container">
  <div class="main-content">
    <h2>予約履歴</h2>
    @if (!$reservations->isEmpty())
      @foreach ($reservations as $reservation)
        <div class="reservation-list">
          <div class="plan-name">
            {{ $reservation->plan->name }}
          </div>
          <div class="reservation-detail">
            <div class="reservation-day">
              チェックイン: {{ $reservation->checkin_day }}
              チェックアウト: {{ $reservation->checkout_day }}
            </div>
            <div class="reservation-room">
              部屋数: {{ $reservation->count }}
              料金: ¥ {{ number_format($reservation->plan->price * $reservation->count) }}
            </div>
            <div class="reservation-action-btn">
            <button class="reservation-edit" onclick="location.href='/plan/{{$reservation->plan->id}}/reservation/{{$reservation->id}}/edit'">予約内容の変更</button>
            <button class="reservation-cancel" onclick="location.href='/plan/{{$reservation->plan->id}}/reservation/{{$reservation->id}}/cancel/confirm'">キャンセル</button>
            </div>
          </div>
        </div>
      @endforeach
    @else
      <h3>現在予約しているプランはありません</h3>
    @endif
  </div>
</div>
@endsection