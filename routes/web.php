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

Route::get('/dashboard', 'Auth\AdminController@dashboard');

// ini route informasi
Route::resource('informasi', 'methode\InformasiController');
Route::resource('karyawan', 'methode\KaryawanController');
Route::resource('pajak', 'methode\PpnController');
Route::resource('kategori', 'methode\KategoriController');
Route::resource('unit', 'methode\UnitController');
Route::resource('barang', 'methode\BarangController');	
Route::prefix('barang')->group(function () {
Route::get('/{id}/stock', 'methode\BarangController@addstock')->name('barang.addstock');
Route::post('/proses', 'methode\BarangController@prosesstock')->name('barang.save');
Route::post('/indextoko', 'methode\InformasiController@indextoko')->name('index.toko');
Route::get('/delete/{id}', 'methode\PosController@destroy')->name('pos.delete');
});
Route::prefix('pos')->group(function () {
	Route::get('/', 'methode\PosController@index');
	});
	Route::post('/addcart', 'methode\PosController@savetablesementara')->name('pos.addcart');
	route::post('/addcart/tb', 'methode\PosController@transaksi')->name('pos.transaksi');
Route::get('/logout', function () {
    Auth::logout();
});