<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();

Route::get('/', 'IndexController@index')->name('home');

/**
 * 后台
 */
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function (){

    //首页
    Route::get('/', 'HomeController@index')->name('admin');
    //welcome
    Route::get('welcome', 'HomeController@welcome')->name('admin.welcome');
    //退出
    Route::get('logout', 'HomeController@logout')->name('admin.logout');

    //登录
    Route::get('login', 'AuthController@enter')->name('admin.login');
    Route::post('login', 'AuthController@login')->name('admin.login');

});
