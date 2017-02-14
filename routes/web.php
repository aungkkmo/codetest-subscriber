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
    return view('subscribe.index');
});

Route::post('subscriber','SubscriberController@store');

Route::get('subscriber/verify/{confirmation_code}','SubscriberController@confirm');


Route::group(['prefix'=>'admin','middlewareGroups' => ['web']], function () {
	Route::get('/','Admin\AdminController@index');

});
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::any('register','HomeController@index');
