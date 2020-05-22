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
        $users = User::all();
        $input = 'よしだ';
        return view('admin.user.searchResult', ['users' => $users, 'input' => $input]);
    }

    public function index(Request $request)
    {
    }

    public function show($id) {
      $item = User::find($id);
      return view('admin.user.detail', ['item'=>$item]);
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', ['user' => $user]);
    }

    // public function editConfirm(User $user, Request $request)
    // {
    //     $this->validate($request, User::$rules);
    //     $user->name = $request->name;
    //     $user->postal = $request->postal;
    //     $user->address = $request->address;
    //     $user->tel  = $request->tel;
    //     $user->birthday = $request->birthday;
    //     $sesdata = $request->session()->put([
    //         'name'     => $request->name,
    //         'postal'   => $request->postal,
    //         'address'  => $request->address,
    //         'tel'      => $request->tel,
    //         'birthday' => $request->birthday
    //     ]);
    //     return view('admin.user.editConfirm', [
    //         'user' => $user,
    //         'session_data' => $sesdata,
    //     ]);
    // }

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
        return view('admin.user.destroyConfirm', ['user' => $user]);
    }

    public function destroy(User $user)
    {
        if ($user->delete()) {
            return redirect(route('admin.home.index'));
        }
    }
}
