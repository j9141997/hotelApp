<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

class UsersController extends Controller
{

    // 新規登録完了画面
    public function completed(User $user)
    {
        return view('user.createCompleted');
    }

    // 編集画面
    public function edit(User $user)
    {
        if ( Auth::guard('user')->check() && Auth::id() == $user->id) {
            return view('user.edit', ['user' => $user]);
        } else {
            // TOPページにリダイレクトする
            $msg = 'ユーザーIDが一致しません';
            return redirect('/')
                ->with('msg', $msg);
        }
    }

    // 会員情報変更 && 完了画面
    public function update(User $user, Request $request)
    {
        $this->validate($request, User::$rules);

        //日付(誕生日)の下限・上限設定(150年前)
        $carbon = new Carbon();
        $minDay = date('Y-m-d', strtotime($carbon->subYears(150)));
        $maxDay = date('Y-m-d', strtotime($carbon->now()));
        //入力値が日にちか否かを評価
        $birthday = $request->birthday;
        if(strtotime($birthday)) {
          //入力値が150年前から現在までの間にあるか否かを評価
          if($birthday < $minDay or $maxDay < $birthday) {
            $msg = '誕生日として正しくありません。';
            return redirect()->back()->with('msg', $msg);
          }
        } else {
          $msg = '誕生日として正しくありません。';
          return redirect()->back()->with('msg', $msg);
        }

        $form = $request->all();
        unset($form['_token']);
        if ($user->fill($form)->save()) {
            return view('user.updateCompleted', ['user' => $user->id]);
        } else {
            $msg = '会員情報の変更に失敗しました';
            return redirect('/')
                ->with('msg', $msg);
        }
    }

    // 退会確認画面
    public function destroyConfirm(User $user)
    {
        // 今日の日付を定義
        $today = date('Y-m-d', strtotime('day'));

        // ログインしているか
        if (!Auth::guard('user')->check()) {
            $msg = 'ログインをしてください';
            return redirect('/')
                ->with('msg', $msg);
        }
        // ログインユーザーと削除予定のユーザーIDが一致しているか
        if (Auth::id() !== $user->id) {
            $msg = 'ログインしているユーザーIDと一致しません';
            return redirect('/')
                ->with('msg', $msg);
        }
        // チェックイン日が未来にあるか
        if ($user->reservations->where('checkin_day', '>', $today)->first()) {
            $msg = 'すでに予約している宿泊プランが存在しています';
            return redirect('/user/' . Auth::id() . '/reservationlist')
                ->with('msg', $msg);
        }

        return view('user.destroyConfirm', ['user' => $user]);
    }

    public function destroy(User $user)
    {
        // 今日の日付を定義
        $today = date('Y-m-d', strtotime('day'));

        // ログインしているか
        if (!Auth::guard('user')->check()) {
            $msg = 'ログインをしてください';
            return redirect('/')
                ->with('msg', $msg);
        }
        // ログインユーザーと削除予定のユーザーIDが一致しているか
        if (Auth::id() !== $user->id) {
            $msg = 'ログインしているユーザーIDと一致しません';
            return redirect('/user/destroy/completed');
        }
        // チェックイン日が未来にあるか
        if ($user->reservations->where('checkin_day', '>', $today)->first()) {
            $msg = 'すでに予約している宿泊プランが存在しています';
            return redirect('/')
                ->with('msg', $msg);
        }

        if ($user->delete()) {
            return redirect('/user/destroy/completed');
        }
    }

    public function destroyCompleted()
    {
        return view('user.destroyCompleted');
    }

    // 予約履歴
    public function reservationList(User $user, Request $request)
    {
        $reservations = $user->reservations;
        return view('user.reservationList', ['reservations' => $reservations]);
    }

}
