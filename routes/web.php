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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//Front
Route::group(['namespace' => 'Front'], function () {
	//Admin
	Route::group(['prefix' => '/'], function(){
		//Home Page
		Route::group(['prefix' => '/'], function(){
			Route::get('/', 'HomeController@index')->name('home');
			Route::get('/pinjam/{id?}', 'HomeController@pinjam')->name('home_pinjam');
			Route::get('/transaksi', 'HomeController@transaksi')->name('home_transaksi')->middleware('can:user_transaksi');
			Route::post('/pengembalian', 'HomeController@pengembalian')->name('home_pengembalian')->middleware('can:user_transaksi');
			Route::get('/list', 'HomeController@daftarbuku')->name('home_daftarbuku');
			Route::get('/list/detail/{id?}', 'HomeController@detailbuku')->name('home_detailbuku');
			Route::get('/kategori/{jenis_buku?}', 'HomeController@jenis')->name('home_jenis');
			Route::get('/pencarian', 'HomeController@pencarian')->name('home_pencarian');
			Route::get('/setting', 'HomeController@setting')->name('home_setting')->middleware('can:user_setting');
			Route::post('/setting', 'HomeController@settingStore')->name('home_setting_store')->middleware('can:user_setting');
		});
	});
});

//Admin
Route::group(['namespace' => 'Admin', 'middleware' => CheckStatus::class], function () {
	//Admin
	Route::group(['prefix' => 'admin'], function(){
		//Dashboard
		Route::group(['prefix' => '/', 'middleware' => 'can:admin_dashboard'], function(){
			Route::get('/', 'DashboardController@index')->name('dashboard');
		});

		//Buku	
		Route::group(['prefix' => 'buku', 'middleware' => 'can:admin_buku'], function(){
			Route::get('/', 'BukuController@index')->name('buku');
			Route::get('/create', 'BukuController@create')->name('buku_create');
			Route::post('/store', 'BukuController@store')->name('buku_store');
			Route::get('/edit/{id?}', 'BukuController@edit')->name('buku_edit');
			Route::put('/update/{id?}', 'BukuController@update')->name('buku_update');
			Route::post('/delete', 'BukuController@delete')->name('buku_delete');
		});

		//Kategori	
		Route::group(['prefix' => 'kategori', 'middleware' => 'can:admin_buku'], function(){
			Route::get('/', 'KategoriController@index')->name('kategori');
			Route::get('/create', 'KategoriController@create')->name('kategori_create');
			Route::post('/store', 'KategoriController@store')->name('kategori_store');
			Route::get('/edit/{id?}', 'KategoriController@edit')->name('kategori_edit');
			Route::put('/update/{id?}', 'KategoriController@update')->name('kategori_update');
			Route::post('/delete', 'KategoriController@delete')->name('kategori_delete');
		});

		//User
		Route::group(['prefix' => 'member', 'middleware' => 'can:admin_member'], function(){
			Route::get('/', 'MemberController@index')->name('member');
			Route::get('/create', 'MemberController@create')->name('member_create');
			Route::post('/store', 'MemberController@store')->name('member_store');
			Route::get('/edit/{id?}', 'MemberController@edit')->name('member_edit');
			Route::put('/update/{id?}', 'MemberController@update')->name('member_update');
			Route::post('/delete', 'MemberController@delete')->name('member_delete');
		});

		//Transaksi
		Route::group(['prefix' => 'transaksi', 'middleware' => 'can:admin_transaksi'], function(){
			Route::get('/', 'TransaksiController@index')->name('transaksi');
			Route::get('/pdf', 'TransaksiController@pdf')->name('transaksi_pdf');
		});
	});
});