<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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

    // ログイン認証後
    Route::middleware('auth:user')->group(function () {

        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);

    });
});

Route::middleware('auth:user')->group(function () {

    // TOPページ
    Route::resource('user', 'UsersController', ['only' => ['edit', 'update', 'destroy']]);
    Route::get('user/{user}/edit/confirm', 'UsersController@editConfirm')->name('user.edit.confirm');
    Route::get('user/{user}/create/confirm', 'UsersController@createConfirm')->name('user.create.confirm');
    Route::get('user/{user}/destroy/confirm', 'UsersController@destroyConfirm')->name('user.destroy.confirm');
    
});

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


        Route::resource('user', 'UsersController', ['only' =>['edit', 'update', 'destroy']]);
        Route::get('user/{user}/edit/confirm', 'UsersController@editConfirm')->name('user.edit.confirm');
        Route::get('user/{user}/create/confirm', 'UsersController@createConfirm')->name('user.create.confirm');
        Route::get('user/{user}/destroy/confirm', 'UsersController@destroyConfirm')->name('user.destroy.confirm');
    }); 

});