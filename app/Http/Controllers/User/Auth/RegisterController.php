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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:50'],
            'postal'   => ['required', 'string', 'max:7'],
            'address'  => ['required', 'string', 'max:200'],
            'tel'      => ['required', 'string', 'max:20'],
            'email'    => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'birthday' => ['required', 'date'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }


    public function createConfirm(Request $request)
    {
        $user = new User;
        $this->validate($request, User::$regist_rules);
        $form = $request->all();
        unset($form['_token']);
        if ($user->fill($form)){
            $sesdata = $request->session()->put([
                'user' => $user,
            ]);
            return view('user.createConfirm', ['user' => $user, ]);
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
        // return redirect()->route('user.completed', ['user' => $user->id]);
    }
}
