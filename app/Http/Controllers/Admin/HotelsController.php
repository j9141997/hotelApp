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
       //
    }
    // 宿一覧検索結果画面
    public function search(Request $request)
    {

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
      return redirect('/admin/home');//リダイレクト先の変更の必要あり
    }

    // 宿詳細＆宿泊プラン一覧画面
    public function show($id)
    {
        //
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
          return redirect('/admin/home');//リダイレクト先の変更の必要あり
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
          return redirect('/admin/home');//リダイレクト先の変更の必要有り
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
