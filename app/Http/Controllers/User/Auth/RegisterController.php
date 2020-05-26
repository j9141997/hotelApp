<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\User;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::COMPLETEDREGISTER;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:user');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // Guardの認証方法を指定
    protected function guard()
    {
        return Auth::guard('user');
    }

    // 新規登録画面
    public function showRegistrationForm()
    {
        return view('user.auth.register');
    }

    // バリデーション
    protected function validator(array $data)
    {

        //日付(誕生日)の下限・上限設定(150年前)
        $carbon = new Carbon();
        $minDay = date('Y-m-d', strtotime($carbon->subYears(150)));
        $maxDay = date('Y-m-d', strtotime($carbon->now()));
        //入力値が日にちか否かを評価
        $birthday = $data['birthday'];
        if(strtotime($birthday)) {
          //条件分岐で誕生日が数値であることを確認しているため、その他のバリデーションをチェック
          return Validator::make($data, [
              'name'     => ['required', 'string', 'max:50'],
              'postal'   => ['required', 'integer', 'digits:7'],
              'address'  => ['required', 'string', 'max:200'],
              'tel'      => ['required', 'integer', 'digits_between:8,20'],
              'email'    => ['required', 'string', 'email', 'max:50', 'unique:users'],
              'birthday' => ['required', 'date', 'after:'.$minDay, 'before:'.$maxDay],
              'password' => ['required', 'string', 'min:6', 'confirmed'],
          ]);
        } else {
          //バリデーション「numeric」により、誕生日が数値でないことをエラー表示する
          return Validator::make($data, [
              'name'     => ['required', 'string', 'max:50'],
              'postal'   => ['required', 'integer', 'digits:7'],
              'address'  => ['required', 'string', 'max:200'],
              'tel'      => ['required', 'integer', 'digits_between:8,20'],
              'email'    => ['required', 'string', 'email', 'max:50', 'unique:users'],
              'birthday' => ['required', 'date', 'after:'.$minDay, 'before:'.$maxDay, 'numeric'],
              'password' => ['required', 'string', 'min:6', 'confirmed'],
          ]);
        }
    }

    // 登録処理
    protected function create(array $data)
    {
        return User::create([
            'name'     => $data['name'],
            'postal'   => $data['postal'],
            'address'  => $data['address'],
            'tel'      => $data['tel'],
            'email'    => $data['email'],
            'birthday' => $data['birthday'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
