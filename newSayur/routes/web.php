<?php
use App\posts;
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

Route::get('/artikel',function(){
    $posts = Posts::orderBy('updated_at','desc')->paginate(6);
    return view('artikel',[
        'posts' => $posts
    ]);
});

Route::get('/readartikel/{id}', function($id){
    $posts = posts::where('artikel_id',$id)->first();

        return view('readartikel',[
            'posts' => $posts
    ]);
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
    
    
    Route::get('/user/hapus/{id}','adminController@hapus')->middleware('admin');
    
    Route::post('/artikel/edit','adminController@edit')->middleware('admin');

    // Artikel
    Route::get('/hapus/{id}','adminController@hapusartikel')->middleware('admin');

    Route::get('/artikel','adminController@pageArtikel')->middleware('admin');

    Route::get('/listartikel','adminController@listArtikel')->middleware('admin');
});
Route::post('/artikel/insert','adminController@insertArtikel');
// Pedagang

Route::get('admin/edit/{id}','adminController@getedit')->middleware('admin');  

Route::get('/daftarpedagang','HomeController@pedagang');

Route::get('/mapspedagang','pedagangController@maps');

Route::get('/pedagang/online/{id}','pedagangController@online');

Route::get('/pedagang/offline/{id}','pedagangController@offline');

// Crud
Route::post('/editdeskripsi','pedagangController@edit');

Route::post ('/insertPedagang','PedagangController@insert');

