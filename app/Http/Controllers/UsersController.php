<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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

    // 新規登録確認画面
    public function createConfirm(User $user)
    {
        return view('user.createConfirm', ['user' => $user]);
    }


    // 編集画面
    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }
    
    // 編集確認画面
    public function editConfirm(User $user)
    {
        return view('user.editConfirm', ['user' => $user]);
    }

    public function destroy(User $user)
    {

    }

    // 退会確認画面
    public function destroyConfirm(User $user)
    {
        return view('user.destroyConfirm', ['user' => $user]);
    }

}
