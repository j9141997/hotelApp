@extends('layouts.user.app')

@section('content')
  @component('components.user.reservationConfirm', ['reservation' => $reservation ])
    @slot('heading')
      <h2>宿泊プランキャンセル確認</h2>
      <p>
          以下の予約をキャンセルします。<br>
          確認が済みましたら、「キャンセル」ボタンを押してください。
      </p>
    @endslot

    @slot('form')
      <form action="{{ route('reservation.destroy', ['plan' => $reservation->plan->id, 'reservation' => $reservation->id]) }}" method="POST" class="confirm-form">
        @csrf
        @method('DELETE')
        <input type="submit" class="confirm-btn create-btn" value="キャンセル">
      </form>
    <button onclick="location.href='/user/{{$reservation->user_id}}/reservationlist'" class="confirm-btn back-btn">戻る</button>
    @endslot
  @endcomponent
@endsection