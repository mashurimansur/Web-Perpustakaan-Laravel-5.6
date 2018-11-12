<?php

use App\Http\Middleware\CheckStatus;

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

//Front
Route::group(['namespace' => 'Front'], function () {
	//Admin
	Route::group(['prefix' => '/'], function(){
		//Home Page
		Route::group(['prefix' => '/'], function(){
			Route::get('/', 'HomeController@index')->name('home');
			Route::get('/pinjam/{id?}', 'HomeController@pinjam')->name('home_pinjam');
			Route::get('/transaksi', 'HomeController@transaksi')->name('home_transaksi');
			Route::post('/pengembalian', 'HomeController@pengembalian')->name('home_pengembalian');
			Route::get('/list', 'HomeController@daftarbuku')->name('home_daftarbuku');
			Route::get('/detail/{id?}', 'HomeController@detailbuku')->name('home_detailbuku');
			Route::get('/jenis/{jenis_buku?}', 'HomeController@jenis')->name('home_jenis');
			Route::get('/pencarian', 'HomeController@pencarian')->name('home_pencarian');
			Route::get('/setting', 'HomeController@setting')->name('home_setting');
			Route::post('/setting', 'HomeController@settingStore')->name('home_setting_store');
		});
	});
});

//Admin
Route::group(['namespace' => 'Admin'], function () {
	//Admin
	Route::group(['prefix' => 'admin', 'middleware' => CheckStatus::class], function(){
		//Dashboard
		Route::group(['prefix' => '/'], function(){
			Route::get('/', 'DashboardController@index')->name('dashboard');
		});

		//Buku
		Route::group(['prefix' => 'buku'], function(){
			Route::get('/', 'BukuController@index')->name('buku');
			Route::get('/create', 'BukuController@create')->name('buku_create');
			Route::post('/store', 'BukuController@store')->name('buku_store');
			Route::get('/edit/{id?}', 'BukuController@edit')->name('buku_edit');
			Route::put('/update/{id?}', 'BukuController@update')->name('buku_update');
			Route::post('/delete', 'BukuController@delete')->name('buku_delete');
		});

		//User
		Route::group(['prefix' => 'member'], function(){
			Route::get('/', 'MemberController@index')->name('member');
			Route::get('/create', 'MemberController@create')->name('member_create');
			Route::post('/store', 'MemberController@store')->name('member_store');
			Route::get('/edit/{id?}', 'MemberController@edit')->name('member_edit');
			Route::put('/update/{id?}', 'MemberController@update')->name('member_update');
			Route::post('/delete', 'MemberController@delete')->name('member_delete');
		});

		//Transaksi
		Route::group(['prefix' => 'transaksi'], function(){
			Route::get('/', 'TransaksiController@index')->name('transaksi');
		});
	});
});