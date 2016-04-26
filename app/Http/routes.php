<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//Route::get('/', 'HomeController@index');

//Route::get('/', 'home\HomeController@index');
Route::get('/','TestController@toProduct');
Route::get('/home', 'TestController@toProduct');
//Route::get('/home', 'HomeController@index');
Route::get('order', 'OrdersController@index');
Route::get('apply', 'AppliesController@index');
Route::post('apply/store', 'AppliesController@store');
// 认证路由...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
// 注册路由...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin','middleware' => 'auth'], function()
{
  
  Route::get('/', 'AdminHomeController@index');
  Route::resource('pages', 'PagesController');
  Route::resource('comments', 'CommentsController');
  Route::resource('applies', 'AppliesController');
});
Route::get('products/{id}', 'ProductsController@show');
Route::post('comment/store', 'CommentsController@store');

Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
Route::get('/cart', 'View\CartController@toCart');


Route::group(['prefix' => 'service'], function () {
  Route::get('validate_code/create', 'Service\ValidateController@create');
  Route::post('validate_phone/send', 'Service\ValidateController@sendSMS');
  Route::post('upload/{type}', 'Service\UploadController@uploadFile');

  Route::post('register', 'Service\MemberController@register');
  Route::post('login', 'Service\MemberController@login');

  Route::get('category/parent_id/{parent_id}', 'Service\BookController@getCategoryByParentId');
  Route::get('cart/add/{product_id}', 'Service\CartController@addCart');
  Route::get('cart/delete', 'Service\CartController@deleteCart');

  Route::post('alipay', 'Service\PayController@aliPay');
  Route::post('wxpay', 'Service\PayController@wxPay');

  Route::post('pay/ali_notify', 'Service\PayController@aliNotify');
  Route::get('pay/ali_result', 'Service\PayController@aliResult');
  Route::get('pay/ali_merchant', 'Service\PayController@aliMerchant');

  Route::post('pay/wx_notify', 'Service\PayController@wxNotify');
});

Route::match(['get', 'post'], '/order_commit', 'View\OrderController@toOrderCommit');
Route::get('/order_list', 'View\OrderController@toOrderList')->middleware(['check.login']);