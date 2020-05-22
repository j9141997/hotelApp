<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reservation;
use App\Plan;

class ReservationsController extends Controller
{
    //　ログインしていなければログイン画面にリダイレクト
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    // 宿泊プラン（予約フォーム）入力画面
    public function create(Plan $plan)
    {
        return view('user.reservation.create', [
            'hotel_id' => $plan->hotel->id,
            'plan'  => $plan
        ]);
    }

    // 宿泊プラン予約 & 宿泊プラン予約完了画面
    public function store(Plan $plan, Request $request)
    {
        $reservation = new Reservation;
        $this->validate($request, Reservation::$rules);
        $reservation->user_id      =  Auth::id();
        $reservation->plan_id      = $plan->id;
        $reservation->count        = $request->count;
        $reservation->checkin_day  = $request->checkin_day;
        $reservation->checkout_day = $request->checkout_day;
        unset($request['_token']);
        if ($reservation->save()) {
            return redirect('user.hotel.store');
        }
    }

    // 宿泊プラン予約変更画面
    public function edit(Plan $plan, Reservation $reservation)
    {
        if (Auth::id() == $reservation->user_id) {
            return view('user.reservation.edit', [
                'reservation' => $reservation,
                'hotel_id'    => $plan->hotel->id,
                'plan_id'     => $plan->id
            ]);
        } else {
            return redirect('/');
        }
    }

    // 宿泊プラン予約変更保存 & 変更完了画面
    public function update(Plan $plan, Reservation $reservation, Request $request)
    {
        $this->validate($request, Reservation::$rules);
        $form = $request->all();
        unset($form['_token']);
        if ($reservation->fill($form)->save()) {
            return view('user.hotel.update');
        }
    }

    // 宿泊プラン予約キャンセル確認画面
    public function cancelConfirm(Plan $plan, Reservation $reservation, Request $request)
    {
        // ログインユーザーIDと予約したユーザーIDが一致しているかどうか
        if ( Auth::id() == $reservation->user_id) {
            return view('user.reservation.cancelConfirm', [
                'reservation' => $reservation
            ]);
        } else {
            // TOPページにリダイレクトする
            return redirect('/');
        }
    }

    // 宿泊プラン予約キャンセル完了画面
    public function destroy(Plan $plan, Reservation $reservation, Request $request)
    {
        // ログインユーザーIDと予約したユーザーIDが一致しているかどうか
        if ( Auth::id() == $reservation->user_id) {
            if ($reservation->delete()) {
                return redirect('user.hotel.destroy');
                // 完了画面が完成したらパスを変更する予定です！ by 吉田
            }
        } else {
            // TOPページにリダイレクトする
            return redirect()->route('/');
        }
    }
}
