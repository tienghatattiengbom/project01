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


Route::group(['prefix' => 'admin','middleware' => ['auth']],function(){

	Route::get('/', function(){
		echo "Hello World";
	});

	Route::group(['prefix' => 'nhansu','as'=>'nhansu'],function(){
		Route::get('/', 'NhansuController@index');	
		Route::get('/show/{id}', 'NhansuController@show')->where('id', '[0-9]+');
		Route::match(['get', 'post'], '/update/{id}', 'NhansuController@update')->where('id', '[0-9]+');
		Route::get('/create', 'NhansuController@create');
		Route::post('/create', 'NhansuController@store');
	});



	Route::group(['prefix' => 'chamcong','as'=>'chamcong'],function(){
		Route::get('/', 'ChamcongController@index');
		Route::get('/create', 'ChamcongController@create');
		Route::get('/keeping', 'ChamcongController@keeping');
		// Route::get('/show/{id}', 'NhansuController@show')->where('id', '[0-9]+');
		// Route::match(['get', 'post'], '/update/{id}', 'NhansuController@update')->where('id', '[0-9]+');
		// Route::get('/create', 'NhansuController@create');
		// Route::post('/create', 'NhansuController@store');
	});
	Route::get('/autocomplete', 'ChamcongController@autocomplete')->name('autocomplete');

	Route::group(['prefix' => 'thuong','as'=>'thuong'],function(){
		Route::get('/', 'ThuongController@index');
		Route::get('/create', 'ThuongController@create');
		Route::get('/keeping', 'ThuongController@keeping');
		Route::get('/show/{id}', 'ThuongController@show')->where('id', '[0-9]+');
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
	
});
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();


