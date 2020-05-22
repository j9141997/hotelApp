<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hotel;

class HotelsController extends Controller
{
    // 検索入力画面
    public function inputSearch(Request $request)
    {
      return view('hotel.inputSearch');
    }


    // 検索結果画面
    public function search(Request $request)
    {
      $hotels = Hotel::where('name', 'like', '%' . $request->hotelname . '%')->get();
      return view('user.hotel.search', ['hotels' => $hotels]);
    }

    public function index()
    {
        $hotels = Hotel::all();
        return view('welcome', ['hotels' => $hotels]);
    }

    // 宿詳細＆宿泊プラン一覧画面
    public function show($id)
    {
      return view('user/hotel/show');
    }
}
