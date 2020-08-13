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

Route::get('/', 'Home\IndexController@index')->name('home');

/**
 * 后台
 */
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function (){

    //首页
    Route::get('/', 'HomeController@index')->name('admin');
    //welcome
    Route::get('welcome', 'HomeController@welcome')->name('welcome');
    //退出
    Route::get('logout', 'HomeController@logout')->name('logout');

    //登录
    Route::get('login', 'AuthController@enter')->name('admin.login');
    Route::post('login', 'AuthController@login')->name('admin.login');

    //设置
    Route::get('user/info', 'SettingController@info')->name('user.info');
    Route::post('user/info', 'SettingController@setInfo')->name('user.info');
    //修改密码
    Route::get('user/password', 'SettingController@password')->name('user.password');
    Route::post('user/password', 'SettingController@setPassword')->name('user.password');
    //网站信息
    Route::get('setting/site', 'SettingController@site')->name('setting.site');
    Route::post('setting/site', 'SettingController@setSite')->name('setting.site');
});
