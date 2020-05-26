<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hotel;
use App\Plan;
use App\Type;

class HotelsController extends Controller
{

    public function index()
    {
      $hotels = Hotel::where('hotel_exist', 1)->paginate(5);
      return view('welcome', ['hotels' => $hotels]);
    }

    // 検索入力画面
    public function inputSearch(Request $request)
    {
      return view('user.hotel.inputSearch');
    }

    // 検索結果画面
    public function search(Request $request)
    {
      $this->validate($request, [
        'name'     => ['max:50'],
        'type_id'  => ['numeric', 'between:0,6'],
      ], [
        'name.max'        => '宿名は50文字以内で入力して下さい。',
        'type_id.numeric' => '宿タイプの選択が正しくありません。',
        'type_id.between' => '宿タイプの選択が正しくありません。',
      ]);
      $name = $request->name;
      $type_id = $request->type_id;
      if(isset($name) === true and isset($type_id) === true) {
        if($type_id != 0) {
          $hotels = Hotel::where('name', 'like', "%$name%")->where('type_id', $type_id)->where('hotel_exist', 1)->paginate(5);
          $type = Type::find($type_id);
          $type_name = $type->name;
          $keyword = '宿名：' . $name . '』と『宿タイプ：' . $type_name;
          return view('user.hotel.search', ['hotels' => $hotels, 'keyword' => $keyword]);
        } else if($type_id == 0) {
          $hotels = Hotel::where('name', 'like',"%$name%")->where('hotel_exist', 1)->paginate(5);
          $keyword = '宿名：' . $name;
          return view('user.hotel.search', ['hotels' => $hotels, 'keyword' => $keyword]);
        }
      } else if(isset($type_id) === true and $type_id != 0) {
        $hotels = Hotel::where('type_id', $type_id)->where('hotel_exist', 1)->paginate(5);
        $type = Type::find($type_id);
        $type_name = $type->name;
        $keyword = '宿タイプ：' . $type_name;
        return view('user.hotel.search', ['hotels' => $hotels, 'keyword' => $keyword]);
      } else {
        $msg = '宿名もしくは宿タイプを入力してください。';
        return redirect('/hotel/search/input')
                 ->with('msg', $msg);
      }
    }

    // 宿詳細＆宿泊プラン一覧画面
    public function show($id)
    {
      $hotel = Hotel::find($id);
      if(isset($hotel) === true) {
        if($hotel->hotel_exist == 1) {
          $plans = Plan::where('hotel_id', $hotel->id)
                          ->where('plan_exist', 1)
                          ->get();
          foreach ($plans as $plan) {
            foreach ($plan->reservations as $reservation) {
            }
          }
          return view('user.hotel.show', [
            'hotel' => $hotel,
            'plans' => $plans
            ]);
        } else {
          $msg = '指定した宿は削除されています。';
          return redirect('/')
                   ->with('msg', $msg);
        }
      } else {
        $msg = '指定した宿は存在しません。';
        return redirect('/')
                 ->with('msg', $msg);
      }
    }
}
