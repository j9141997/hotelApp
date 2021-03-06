<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hotel;

class ReservationsController extends Controller
{
    // 管理者ログインしていなければ、ログインページにリダイレクト
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // 宿泊プラン入力画面
    public function create()
    {
      $hotels = HOTEL::all();
      return view('admin.plan.add', ['hotels' => $hotels ]);
    }

    // 宿泊プラン登録 & 宿泊プラン完了画面
    public function store(Request $request)
    {

    }

    // 宿泊プラン編集画面
    public function edit(Request $request)
    {

    }

    // 宿泊プラン更新 & 宿泊プラン更新完了画面
    public function update(Request $request)
    {

    }

    // 宿泊プラン削除確認画面
    public function destroyConfirm(Request $request)
    {

    }

    // 宿泊プラン削除 & 宿泊プラン削除完了画面
    public function destroy(Request $request)
    {

    }
}
