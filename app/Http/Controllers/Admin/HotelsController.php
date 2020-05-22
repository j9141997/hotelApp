<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hotel;
use App\Type;

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
      return view('admin.hotel.inputSearch');
    }
    // 宿一覧検索結果画面
    public function search(Request $request)
    {

      $hotels = Hotel::where('name', 'like', '%' . $request->hotelname . '%')->get();
      return view('admin.hotel.search',['hotels' => $hotels,
                                        'keyword' => $request->hotelname
                                      ]);

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
        $type = Type::find($type_id);
        $type_name = $type->name;
        $in_msg = $type_name . 'に属する宿名：' . $name;
        return view('admin.hotel.searchResult', ['in_msg' => $in_msg, 'hotels' => $hotels, 'type_name' => $type_name]);
      } else if(isset($name) === true and isset($type_id) === true and $type_id == 0) {
        //dd('input name');
        $hotels = Hotel::where('name', 'like',"%$name%")->get();
        $in_msg = $name;
        return view('admin.hotel.searchResult', ['in_msg' => $in_msg, 'hotels' => $hotels]);
      } else if(isset($type_id) === true and $type_id != 0) {
        //dd('input type_id');
        $hotels = Hotel::where('type_id', $type_id)->get();
        $type = Type::find($type_id);
        $type_name = $type->name;
        $in_msg =  $type_name . 'に属する宿';
        return view('admin.hotel.searchResult', ['in_msg' => $in_msg, 'hotels' => $hotels, 'type_name' => $type_name]);
      } else {
        $in_msg = '宿名もしくは宿タイプを入力してください。';
        return redirect('/admin/hotel/search/input')
                 ->with('in_msg', $in_msg);
      }
    }
    // 宿の保存 & 宿完了画面

    // 宿の登録入力画面
    public function create(Request $request)
    {

      return view('admin.hotel.add');//テンプレート変更の必要有り
    }

    public function store(Request $request)
    {
      $this->validate($request, Hotel::$mainRules, Hotel::$messages);
      $this->validate($request, Hotel::$imageRules, Hotel::$messages);
      $hotel = new Hotel;
      $form = $request->all();

      //画像の処理
      $image = $form['image'];
      $path = $image->store('public');
      $form['image'] = str_replace('public/', '', $path);

      $form['hotel_exist'] = 1;
      unset($form['_token']);
      $hotel->fill($form)->save();
      return view('admin.hotel.store');
    }

    // 宿詳細＆宿泊プラン一覧画面
    public function show($id)
    {
        $hotel = Hotel::find($id);
        return view('admin.hotel.show',['hotel'=> $hotel]);
    }

    // 宿編集画面
    public function edit($id)
    {
      $hotel = Hotel::find($id);
      if(isset($hotel) === true) {
        if($hotel->hotel_exist == 1) {
          return view('admin.hotel.edit', ['form'=>$hotel]);//テンプレート変更の必要有り
        } else {
          $msg = '指定した宿は削除されています。';
          return redirect('/admin/home')//リダイレクト先の変更の必要あり
                   ->with('msg', $msg);
        }
      } else {
        $msg = '指定した宿は存在しません。';
        return redirect('/admin/home')//リダイレクト先の変更の必要あり
                 ->with('msg', $msg);
      }
    }

    // 宿更新画面 & 宿完了画面
    public function update(Request $request, $id)
    {
      $hotel = Hotel::find($id);
      if(isset($hotel) === true) {
        if($hotel->hotel_exist == 1) {
          $this->validate($request, Hotel::$mainRules, Hotel::$messages);
          if(isset($request->image) === true) {
            //dd('Image!');
            $this->validate($request, Hotel::$imageRules, Hotel::$messages);
            $form = $request->all();
            //画像の処理
            $image = $form['image'];
            $path = $form['image']->store('public');
            $form['image'] = str_replace('public/', '', $path);
          } else {
            //dd('No image!');
            $form = $request->all();
          }
          unset($form['_token']);
          $hotel->fill($form)->save();
          return view('admin.hotel.update');
          } else {
          $msg = '指定した宿泊プランは削除されています。';
          return redirect('/admin/home')//リダイレクト先の変更の必要あり
                   ->with('msg', $msg);
        }
      } else {
        $msg = '指定した宿は存在しません。';
        return redirect('/admin/home')//リダイレクト先の変更の必要あり
                 ->with('msg', $msg);
      }
    }

    // 宿削除確認画面
    public function destroyConfirm($id)//Request $request)
    {
      $hotel = Hotel::find($id);
      if(isset($hotel) === true) {
        if($hotel->hotel_exist == 1) {
          return view('admin.hotel.test3', ['form'=>$hotel]);//テンプレート変更の必要有り
        } else {
          $msg = '指定した宿は削除されています。';
          return redirect('/admin/home')//リダイレクト先の変更の必要あり
                   ->with('msg', $msg);
        }
      } else {
        $msg = '指定した宿は存在しません。';
        return redirect('/admin/home')//リダイレクト先の変更の必要あり
                 ->with('msg', $msg);
      }
    }

    // 宿削除 & 宿削除完了画面
    public function destroy(Request $request, $id)
    {
      $hotel = Hotel::find($id);
      if(isset($hotel) === true) {
        if($hotel->hotel_exist == 1) {
          $hotel->hotel_exist = 0;
          $hotel->save();
          return view('admin.hotel.destroy');
        } else {
          $msg = '指定した宿は削除されています。';
          return redirect('/admin/home')//リダイレクト先の変更の必要有り
                   ->with('msg', $msg);
        }
      } else {
        $msg = '指定した宿は存在しません。';
        return redirect('/admin/home')//リダイレクト先の変更の必要あり
                 ->with('msg', $msg);
      }
    }
}
