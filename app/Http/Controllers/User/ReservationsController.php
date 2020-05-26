<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reservation;
use App\Plan;
use Carbon\Carbon;

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
        // 満室の場合
        if ($plan->countRoom($this) <= 0) {
            $msg = '既に満室です';
            return redirect("/hotel/$plan->hotel_id")
                ->with('msg', $msg);
        }

        return view('user.reservation.create', [
            'hotel_id' => $plan->hotel->id,
            'plan'  => $plan
        ]);
    }

    // 宿泊プラン予約 & 宿泊プラン予約完了画面
    public function store(Plan $plan, Request $request)
    {

        $checkin_day  = new Carbon($request->checkin_day);
        $checkout_day = new Carbon($request->checkout_day);

        // 満室の場合
        if ($plan->countRoom($this) <= 0) {
            $msg = '既に満室です';
            return redirect("/hotel/$plan->hotel_id")
                ->with('msg', $msg);
        }

        // 既存予約（配列）
        $existReservations = Auth::user()->reservations;
        // 既に予約が5件以上存在する場合
        if (count($existReservations) >= Reservation::$max) {
            $msg = '既に予約数が5件存在するため、予約できません';
            return redirect("/plan/$plan->id/reservation/create")
                ->with('msg', $msg);
        }

        $checkin_day = new Carbon($request->checkin_day);
        $checkout_day = new Carbon($request->checkout_day);
        // チェックイン日、チェックアウト日が被っている場合
        foreach($existReservations as $res) {
            if ($checkin_day->between(Carbon::parse($res->checkin_day), Carbon::parse($res->checkout_day))
                or $checkout_day->between(Carbon::parse($res->checkin_day), Carbon::parse($res->checkout_day))) {
                $msg = '入力した日付は既に予約が入っております';
                return redirect("/plan/$plan->id/reservation/create")
                    ->with('msg', $msg);
            }
        }

        // チェックアウト日がチェックイン日より過去の場合
        if ($checkout_day->diff($checkin_day)->invert == 0) {
            $msg = 'チェックアウト日をチェックイン日より後の日にしてください';
            return redirect("/plan/$plan->id/reservation/create")
            ->with('msg', $msg);
        }

        $reservation = new Reservation;
        $this->validate($request, Reservation::$rules);
        $reservation->user_id      =  Auth::id();
        $reservation->plan_id      = $plan->id;
        $reservation->count        = $request->count;
        $reservation->checkin_day  = $request->checkin_day;
        $reservation->checkout_day = $request->checkout_day;
        unset($request['_token']);
        if ($reservation->save()) {
            return view('user.hotel.store');
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

        // 既存予約（配列）
        $existReservations = Auth::user()->reservations;
        $reservation_id = $request->id;
        $checkin_day = new Carbon($request->checkin_day);
        $checkout_day = new Carbon($request->checkout_day);
        // チェックイン日、チェックアウト日が被っている場合
        foreach($existReservations as $res) {
          //編集する予約のチェックイン・チェックアウト日の評価を除く
          if($res->id != $reservation_id) {
            if ($checkin_day->between(Carbon::parse($res->checkin_day), Carbon::parse($res->checkout_day))
                or $checkout_day->between(Carbon::parse($res->checkin_day), Carbon::parse($res->checkout_day))) {
                $msg = '入力した日付は既に予約が入っております';
                return redirect()->back()->with('msg', $msg);
            }
          }
        }

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
                return view('user.reservation.destroy');
            }
        } else {
            // TOPページにリダイレクトする
            return redirect()->route('/');
        }
    }
}
