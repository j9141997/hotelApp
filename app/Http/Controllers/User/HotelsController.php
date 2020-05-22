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
      return view('user.hotel.inputSearch');
    }


    // 検索結果画面
    public function search(Request $request)
    {
      // $hotels = Hotel::where('name', 'like', '%' . $request->hotelname . '%')->get();
      // return view('user.hotel.search', ['hotels' => $hotels,'keyword' => $request->hotelname]);

      $this->validate($request, [
        'name'     => ['max:50'],
        'type_id'  => ['numeric', 'between:0,6'],
      ], [
        'name.string'     => '1',
        'name.max'        => '2',
        'type_id.numeric' => '3',
        'type_id.between' => '4',
      ]);
      $name = $request->name;
      $type_id = $request->type_id;
      if(isset($name) === true and isset($type_id) === true and $type_id != 0) {
        //dd('input name and type_id');
        $hotels = Hotel::where('name', 'like',"%$name%")
                         ->where('type_id', $type_id)->get();
        // $type = Type::find($type_id);
        // $type_name = $type->name;
        // $in_msg = $type_name . 'に属する宿名：' . $name;
        return view('user.hotel.search', ['hotels' => $hotels, 'keyword' => $name]);
      } else if(isset($name) === true and isset($type_id) === true and $type_id == 0) {
        //dd('input name');
        $hotels = Hotel::where('name', 'like',"%$name%")->get();
        // $in_msg = $name;
        return view('user.hotel.search', ['hotels' => $hotels, 'keyword' => $name]);
      } else if(isset($type_id) === true and $type_id != 0) {
        //dd('input type_id');
        $hotels = Hotel::where('type_id', $type_id)->get();
        // $type = Type::find($type_id);
        // $type_name = $type->name;
        // $in_msg =  $type_name . 'に属する宿';
        return view('user.hotel.search', [ 'hotels' => $hotels, 'keyword' => $name]);
      } else {
        $in_msg = '宿名もしくは宿タイプを入力してください。';
        return redirect('/user/hotel/search/input')
                 ->with('in_msg', $in_msg);
      }
    }

    // 宿詳細＆宿泊プラン一覧画面
    public function show($id)
    {
      $hotel = Hotel::find($id);
      return view('user.hotel.show', ['hotel' => $hotel]);
    }
}
