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
    return redirect(route('admin'));
});


Route::group(['prefix' => 'admin','middleware' => ['auth']],function(){

	Route::get('/', 'DasController@index')->name('admin');

	Route::group(['prefix' => 'nhansu'],function(){
		Route::get('/', 'NhansuController@index')->name('nhansuindex');
		Route::get('/show/{id}', 'NhansuController@show')->where('id', '[0-9]+');
		Route::get('/delete/{id}', 'NhansuController@destroy')->where('id', '[0-9]+');
		Route::match(['get', 'post'], '/update/{id}', 'NhansuController@update')->where('id', '[0-9]+');
		Route::get('/create', 'NhansuController@create');
		Route::post('/store', 'NhansuController@store');
	});



	Route::group(['prefix' => 'chamcong'],function(){
		Route::get('/', 'ChamcongController@index')->name('chamcongindex');
		Route::get('/create', 'ChamcongController@create');
		Route::get('/keeping', 'ChamcongController@keeping');
		Route::get('/delete/{id}', 'ChamcongController@destroy');
	});
	Route::get('/autocomplete', 'ChamcongController@autocomplete')->name('autocomplete');

	Route::group(['prefix' => 'thuong'],function(){
		Route::get('/', 'ThuongController@index')->name('thuongindex');
		Route::get('/create', 'ThuongController@create');
		Route::get('/keeping', 'ThuongController@keeping');
		Route::get('/show/{id}', 'ThuongController@show')->where('id', '[0-9]+');
		Route::get('/delete/{id}', 'ThuongController@destroy')->where('id', '[0-9]+');
		Route::match(['get', 'post'], '/update/{id}', 'ThuongController@update')->where('id', '[0-9]+');
	});

	Route::group(['prefix' => 'luong','as'=>'luong'],function(){
		Route::get('/', 'LuongController@index');
		Route::get('/keeping', 'LuongController@keeping');
		Route::get('/show/{id}', 'LuongController@show')->where('id', '[0-9]+');
		Route::match(['get', 'post'], '/update/{id}', 'LuongController@update')->where('id', '[0-9]+');
		Route::match(['get', 'post'], '/create/', 'LuongController@create');
	});


	Route::group(['prefix' => 'user','as'=>'user'],function(){
		Route::get('/', 'UserController@index');
		Route::match(['get', 'post'], '/create/', 'UserController@create');
		Route::match(['get', 'post'], '/update/{id}', 'UserController@update')->where('id','[0-9]+');
	});

	Route::group(['prefix' => 'phongban'],function(){
		Route::get('/', 'PhongbanController@index')->name('phongbanindex');
		Route::match(['get', 'post'], '/create/', 'PhongbanController@create');
		Route::get('/show/{id}', 'PhongbanController@show')->where('id', '[0-9]+');
		Route::match(['get', 'post'], '/update/{id}', 'PhongbanController@update')->where('id','[0-9]+');
		Route::get('/delete/{id}', 'PhongbanController@destroy');
	});

	Route::group(['prefix' => 'sobaohiem'],function(){
		Route::get('/', 'SobaohiemController@index')->name('sobaohiemindex');
		Route::match(['get', 'post'], '/create/', 'SobaohiemController@create');
		Route::get('/show/{id}', 'SobaohiemController@show')->where('id', '[0-9]+');
		Route::match(['get', 'post'], '/update/{id}', 'SobaohiemController@update')->where('id','[0-9]+');
		Route::post('/create', 'SobaohiemController@store');
		Route::get('/delete/{id}', 'SobaohiemController@destroy');
	});

	Route::group(['prefix' => 'hopdong'],function(){
		Route::get('/', 'HopdongController@index')->name('hopdongindex');
		Route::match(['get', 'post'], '/create/', 'HopdongController@create');
		Route::get('/show/{id}', 'HopdongController@show')->where('id', '[0-9]+');
		Route::match(['get', 'post'], '/update/{id}', 'HopdongController@update')->where('id','[0-9]+');
		Route::get('/delete/{id}', 'HopdongController@destroy');
	});

	Route::get('/reset','DasController@reset')->name('reset');
	
});
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();


