<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsersController extends Controller
{

    // ログインしていたらそのまま、ログインされていなければログインviewに飛ばす。
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function inputSearch()
    {
        return view('admin.user.inputSearch');
    }

    public function search(Request $request)
    {
         $users = User::where('name', 'like', "%$request->input%")->get();
         return view('admin.user.searchResult', ['input' => $request->input, 'users' => $users]);
    }

    public function index(Request $request)
    {
    }

    public function show($id) {
      $item = User::find($id);
      if(isset($item) === true) {
        return view('admin.user.detail', ['item'=>$item]);
      } else {
        $msg = '指定した会員は存在しません。';
        return redirect('/admin/home')//リダイレクト先の変更の必要有り
                 ->with('msg', $msg);
      }
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', ['user' => $user]);
    }

    public function update(User $user, Request $request)
    {
        $this->validate($request, User::$rules);
        $form = $request->all();
        unset($form['_token']);
        if ($user->fill($form)->save()) {
            return redirect()->route('admin.home.index');
        }
    }



    public function destroyConfirm(User $user)
    {
        // 今日の日付を定義
        $today = date('Y-m-d', strtotime('day'));
        // チェックイン日が未来にあるか
        if ($user->reservations->where('checkin_day', '>', $today)->first()) {
            $msg = '会員がすでに予約している宿泊プランが存在しています';
            return redirect("admin/user/$user->id")
                ->with('msg', $msg);
        }
        return view('admin.user.destroyConfirm', ['user' => $user]);
    }

    public function destroy(User $user)
    {
        // 今日の日付を定義
        $today = date('Y-m-d', strtotime('day'));
        // チェックイン日が未来にあるか
        if ($user->reservations->where('checkin_day', '>', $today)->first()) {
            $msg = '会員がすでに予約している宿泊プランが存在しています';
            return redirect("admin/user/$user->id")
                ->with('msg', $msg);
        }
        if ($user->delete()) {
            return view('admin.user.destroyCompleted');
        }
    }
}
