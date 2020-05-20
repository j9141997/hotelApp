<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// ユーザー
Route::namespace('User')->prefix('user')->name('user.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);
    Route::post('createConfirm', 'Auth\RegisterController@createConfirm');

    // ログイン認証後
    Route::middleware('auth:user')->group(function () {

        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);
    });
});

Route::middleware('auth:user')->group(function () {

    // TOPページ
    Route::resource('user', 'UsersController', ['only' => ['edit', 'update', 'destroy']]);
    Route::get('user/{user}/completed', 'UsersController@completed')->name('user.completed');
    Route::get('user/{user}/destroy/confirm', 'UsersController@destroyConfirm')->name('user.destroy.confirm');
    Route::get('user/{user}/reservationlist', 'UsersController@reservationList')->name('user.reservationlist');
    // Route::get('user/{user}/edit/confirm', 'UsersController@editConfirm')->name('user.edit.confirm');
    // Route::get('user/{user}/create/confirm', 'UsersController@createConfirm')->name('user.create.confirm');
    // Route::get('user/{user}/destroy/confirm', 'UsersController@destroyConfirm')->name('user.destroy.confirm');

    // 宿泊プラン関連（予約・変更・キャンセル）
    Route::resource('hotel/{hotel}/reservation', 'User\ReservationsController');
});

Route::resource('hotel', 'User\HotelsController', ['only' => 'show']);
Route::get('hotel/inputsearch', 'User\HotelsController@inputSearch');
Route::get('hotel/search', 'User\HotelsController@search');
 



// 管理者
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::middleware('auth:admin')->group(function () {

        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);

        // 会員情報関連
        Route::resource('user', 'UsersController');
        Route::get('user/{user}/edit/confirm', 'UsersController@editConfirm')->name('user.edit.confirm');
        Route::get('user/{user}/create/confirm', 'UsersController@createConfirm')->name('user.create.confirm');
        Route::get('user/{user}/destroy/confirm', 'UsersController@destroyConfirm')->name('user.destroy.confirm');

        // 宿関連
        Route::resource('hotel', 'HotelsController');
        Route::get('hotel/inputsearch', 'HotelsController@inputSearch');
        Route::get('hotel/search', 'HotelsController@search');
        Route::get('hotel/{hotel}/destroy/confirm', 'HotelsController@destroyConfirm');

        // 宿泊プラン関連
        Route::prefix('hotel/{hotel}')->group(function(){
            Route::resource('reservation', 'ReservationsController', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
            Route::get('reservation/{reservation}/destroy/confirm', 'ReservationsController@destroyConfirm')->name('reservation.destroy.confirm');
        });
    });

});
