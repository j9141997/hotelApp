<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hotel;
use App\Plan;

class PlansController extends Controller
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
          $this->validate($request, Plan::$rules, Plan::$messages);
          $hotel = Hotel::find($request->hotel_id);
          if(isset($hotel) === true) {
            if($hotel->hotel_exist == 1) {
              $plan = new Plan;
              $form = $request->all();
              $form['plan_exist'] = 1;
              unset($form['_token']);
              $plan->fill($form)->save();
              return view('admin.plan.store');
            } else {
              $msg = '指定したホテルIDは削除されています。';
              return redirect('/admin/home')//リダイレクト先の変更の必要有り
                       ->with('msg', $msg);
            }
          } else {
            $msg = '指定したホテルIDは存在しません。';
            return redirect('/admin/home')//リダイレクト先の変更の必要有り
                     ->with('msg', $msg);
          }
        }

        // 宿泊プラン編集画面
        public function edit($id)
        {
          $plan = Plan::find($id);
          $hotel = Hotel::find($plan->hotel_id);
          if(isset($hotel) === true) {
            if($hotel->hotel_exist == 1) {
              if(isset($plan) === true) {
                if($plan->plan_exist == 1) {
                  return view('admin.plan.test2', ['form'=>$plan]);//テンプレート変更の必要有り
                } else {
                  $msg = '指定した宿泊プランは削除されています。';
                  return redirect('/admin/home')//リダイレクト先の変更の必要有り
                           ->with('msg', $msg);
                }
              } else {
                $msg = '指定した宿泊プランは存在しません。';
                return redirect('/admin/home')//リダイレクト先の変更の必要有り
                         ->with('msg', $msg);
              }
            } else {
              $msg = '指定したホテルIDは削除されています。';
              return redirect('/admin/home')//リダイレクト先の変更の必要有り
                       ->with('msg', $msg);
            }
          } else {
            $msg = '指定したホテルIDは存在しません。';
            return redirect('/admin/home')//リダイレクト先の変更の必要有り
                     ->with('msg', $msg);
          }
        }

        // 宿泊プラン更新 & 宿泊プラン更新完了画面
        public function update(Request $request, $id)
        {
          $this->validate($request, Plan::$rules, Plan::$messages);
          $hotel = Hotel::find($request->hotel_id);
          if(isset($hotel) === true) {
            if($hotel->hotel_exist == 1) {
              $plan = Plan::find($id);
              if(isset($plan) === true) {
                if($plan->plan_exist == 1) {
                  $form = $request->all();
                  unset($form['_token']);
                  $plan->fill($form)->save();
                  return view('admin.plan.update');
                } else {
                  $msg = '指定した宿泊プランは削除されています。';
                  return redirect('/admin/home')//リダイレクト先の変更の必要有り
                           ->with('msg', $msg);
                }
              } else {
                $msg = '指定した宿泊プランは存在しません。';
                return redirect('/admin/home')//リダイレクト先の変更の必要有り
                         ->with('msg', $msg);
              }
            } else {
              $msg = '指定したホテルIDは削除されています。';
              return redirect('/admin/home')//リダイレクト先の変更の必要有り
                       ->with('msg', $msg);
            }
          } else {
            $msg = '指定したホテルIDは存在しません';
            return redirect('/admin/home')//リダイレクト先の変更の必要有り
                     ->with('msg', $msg);
          }
        }

        // 宿泊プラン削除確認画面
        public function destroyConfirm($id)
        {
          $plan = Plan::find($id);
          if(isset($plan) === true) {
            if($plan->plan_exist == 1) {
              return view('admin.plan.test3', ['form'=>$plan]);//テンプレート変更の必要有り
            } else {
              $msg = '指定した宿泊プランは削除されています。';
              return redirect('/admin/home')//リダイレクト先の変更の必要有り
                       ->with('msg', $msg);
            }
          } else {
            $msg = '指定した宿泊プランは存在しません。';
            return redirect('/admin/home')//リダイレクト先の変更の必要有り
                     ->with('msg', $msg);
          }
        }

        // 宿泊プラン削除 & 宿泊プラン削除完了画面
        public function destroy(Request $request, $id)
        {
          $plan = Plan::find($id);
          if(isset($plan) === true) {
            if($plan->plan_exist == 1) {
              $plan->plan_exist = 0;
              $plan->save();
              return view('admin.plan.destroy');
            } else {
              $msg = '指定した宿泊プランは削除されています。';
              return redirect('/admin/home')//リダイレクト先の変更の必要有り
                       ->with('msg', $msg);
            }
          } else {
            $msg = '指定した宿泊プランは存在しません。';
            return redirect('/admin/home')//リダイレクト先の変更の必要有り
                     ->with('msg', $msg);
          }
        }
}
