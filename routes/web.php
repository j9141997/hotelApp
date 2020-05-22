<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'User\HotelsController@index');

// ユーザー
Route::namespace('User')->prefix('user')->name('user.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);
    Route::post('createConfirm', 'Auth\RegisterController@createConfirm')->name('confirm');

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
    Route::resource('plan/{plan}/reservation', 'User\ReservationsController');
    Route::get('plan/{plan}/reservation/{reservation}/cancel/confirm', 'User\ReservationsController@cancelConfirm');
});

Route::resource('hotel', 'User\HotelsController', ['only' => 'show']);
Route::get('hotel/search/input', 'User\HotelsController@inputSearch');
Route::get('hotel/search/result', 'User\HotelsController@search');




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
        Route::get('user/search/input', 'UsersController@inputSearch');
        Route::post('user/search/result', 'UsersController@search');
        Route::get('user/{user}/edit/confirm', 'UsersController@editConfirm')->name('user.edit.confirm');
        Route::get('user/search/input', 'UsersController@inputSearch');
        Route::get('user/search/result', 'UsersController@search');
        Route::get('user/{user}/create/confirm', 'UsersController@createConfirm')->name('user.create.confirm');
        Route::get('user/{user}/destroy/confirm', 'UsersController@destroyConfirm')->name('user.destroy.confirm');

        // 宿関連
        Route::resource('hotel', 'HotelsController');
        Route::get('hotel/search/input', 'HotelsController@inputSearch');
        Route::get('hotel/search/result', 'HotelsController@search');
        Route::get('hotel/{hotel}/destroy/confirm', 'HotelsController@destroyConfirm');

        // 宿泊プラン関連
        Route::resource('plan', 'PlansController', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
        Route::get('plan/{plan}/destroy/confirm', 'PlansController@destroyConfirm');
    });

});
