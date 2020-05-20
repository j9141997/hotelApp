<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hotel;

class ReservationsController extends Controller
{
    //　ログインしていなければログイン画面にリダイレクト
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    // 宿泊プラン（予約フォーム）入力画面
    public function create(Hotel $hotel)
    {
        $hotel = Hotel::find(1000000000);
        dd($hotel);
        return view('user.reservation.create');
    }

    // 宿泊プラン予約 & 宿泊プラン予約完了画面
    public function store(Request $request)
    {

    }

    // 宿泊プラン予約変更画面
    public function edit(Request $request)
    {

    }

    // 宿泊プラン予約変更保存 & 変更完了画面
    public function update(Request $request)
    {

    }

    // 宿泊プラン予約キャンセル確認画面
    public function cancel(Request $request)
    {

    }

    // 宿泊プラン予約キャンセル完了画面
    public function destroy(Request $request)
    {

    }
}
