<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//pc端
Route::get('/userlogin', 'User\UserController@loginView');//访问登录页面
Route::post('/userlogin', 'User\UserController@loginAction');//登录页面


Route::get('/resistr', 'User\UserController@registerView');//访问注册
Route::post('/register', 'User\UserController@registerAction');//注册页面
Route::get('/quit', 'User\UserController@quit');//退出（清除cookie），


//移动端
Route::get('/apilogin','User\UserController@alogin'); //访问登录页面
Route::post('/apilogin','User\UserController@apilogins'); //登录页面

//=========================================================================================================
Route::any('/dome', 'Weixin\UserController@dome');//登录页面



