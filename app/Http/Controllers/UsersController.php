<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest:user');
    // }

    public function create(User $user)
    {

    }

    // 新規登録完了画面
    public function completed(User $user)
    {
        return view('user.completed');
    }


    // 編集画面
    public function edit(User $user)
    {
        if ( Auth::guard('user')->check() && Auth::id() == $user->id) {
            return view('user.edit', ['user' => $user]);
        } else {
            // TOPページにリダイレクトする
            return redirect()->route('user.home.index');
        }
    }
    
    // // 編集確認画面
    // public function editConfirm(User $user)
    // {
    //     return view('user.editConfirm', ['user' => $user]);
    // }

    public function update(User $user, Request $request)
    {
        $this->validate($request, User::$rules);
        $form = $request->all();
        unset($form['_token']);
        if ($user->fill($form)->save()) {
            return redirect()->route('user.completed', ['user' => $user->id]);
        }
    }

    public function destroy(User $user)
    {
        if ($user->delete()) {
            return redirect(route('user.home.index'));
        }
    }

    // 退会確認画面
    public function destroyConfirm(User $user)
    {
        // ログインしているユーザーIDと削除予定のユーザーIDが一致しているか
        if ( Auth::guard('user')->check() && Auth::id() == $user->id) {
            return view('user.destroyConfirm', ['user' => $user]);
        } else {
            // TOPページにリダイレクトする
            return redirect()->route('user.home.index');
        }
    }

    // 予約履歴
    public function reservationList(Request $request)
    {

    }

}
