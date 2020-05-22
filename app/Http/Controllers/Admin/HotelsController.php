<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HotelsController extends Controller
{

    // 管理者ログインしていなければ、ログインページにリダイレクト
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // 管理者コントローラ

    // 検索入力画面
    public function inputSearch(Request $request)
    {
      return view('hotel.inputSearch');
    }
    // 宿一覧検索結果画面
    public function search(Request $request)
    {

    }

    // 宿の登録入力画面
    public function create()
    {
        //
    }

    // 宿の保存 & 宿完了画面
    public function store(Request $request)
    {
      return view('admin.hotel.store');
    }

    // 宿詳細＆宿泊プラン一覧画面
    public function show($id)
    {
        //
    }

    // 宿編集画面
    public function edit($id)
    {
      //
    }

    // 宿更新画面 & 宿完了画面
    public function update(Request $request, $id)
    {
      return view('admin.hotel.update');
    }

    // 宿削除確認画面
    public function destroyConfirm(Request $request)
    {

    }

    // 宿削除 & 宿削除完了画面
    public function destroy($id)
    {
        return view('admin.hotel.destroy');
    }

    public function miyauchi()
    {
      dd('working Miyauchi!');
      return view('hotel.hConplication');
    }
}
