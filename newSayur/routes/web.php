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
    return view('home');
});

Auth::routes();
// User
Route::get('/home', 'HomeController@index');

Route::get('/maps', 'HomeController@Maps')->middleware('pedagang');
// Admin

Route::group(['prefix' => 'admin'], function() {
    
    Route::get('/','adminController@index')->middleware('admin');
    // Data Pedagang
    
    Route::get('/terima/{id}','adminController@terima')->middleware('admin');
    
    Route::get('/tolak/{id}','adminController@tolak')->middleware('admin');
    
    // Data User
    Route::get('/user','adminController@user')->middleware('admin');
    
    Route::get('/user/edit/{id}','adminController@getedit')->middleware('admin');
    Route::get('/user/hapus/{id}','adminController@hapus')->middleware('admin');
    
    Route::post('/user/editt','adminController@edit')->middleware('admin');

    // Artikel
    Route::get('/artikel','adminController@pageArtikel')->middleware('admin');

});
Route::post('/artikel/insert','adminController@insertArtikel');
// Pedagang

Route::get('/daftarpedagang','HomeController@pedagang');

Route::get('/mapspedagang','pedagangController@maps');

Route::get('/pedagang/online/{id}','pedagangController@online');

Route::get('/pedagang/offline/{id}','pedagangController@offline');

// Crud
Route::post('/editdeskripsi','pedagangController@edit');

Route::post ('/insertPedagang','PedagangController@insert');
