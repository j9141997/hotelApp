<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hotel;

class HotelsController extends Controller
{
    // 管理者ログインしていなければ、ログインページにリダイレクト
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // 管理者コントローラ

    // 検索入力画面
    // もしかしたらweb.phpにてreturn viewのみで実装できるかも
    public function inputSearch(Request $request)
    {

    }
    // 宿一覧検索結果画面
    public function search(Request $request)
    {

    }
    // 宿の保存 & 宿完了画面

    // 宿の登録入力画面
    public function create()
    {
        return view('admin.hotel.add');
    }

    public function store(Request $request)
    {
      return redirect('/');//テスト用
    }

    // 宿詳細＆宿泊プラン一覧画面
    public function show($id)
    {
        //
    }

    // 宿編集画面
    public function edit($id)
    {
        return view('admin.hotel.edit');
    }

    // 宿更新画面 & 宿完了画面
    public function update(Request $request, $id)
    {
        //
    }

    // 宿削除確認画面
    public function destroyConfirm(Request $request)
    {

    }
    public function add(Request $request)
    {

      return view('admin.hotel.add');
    }

    // 宿削除 & 宿削除完了画面
    public function destroy($id)
    {

    }
}
