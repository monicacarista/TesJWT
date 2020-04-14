<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//route API Auth
    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@login');
    Route::get('book', 'BookController@book');
    Route::get('bookall', 'BookController@bookAuth')->middleware('jwt.verify');
    Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');
    Route::middleware('jwt.auth')->group(function(){
        Route::get('logout', 'UserController@logout');
    });    
//route CRUD Donatur
Route::get('/donatur','DonaturController@index');
Route::post('/postdonatur','DonaturController@create');
Route::post('/donatur/{id_donatur}','DonaturController@update');
Route::delete('/donatur/{id}','DonaturController@delete');

//route CRUD Donasi
Route::get('/donasi','DonasiController@index');
Route::post('/postdonasi','DonasiController@create');
Route::post('/donasi/{id}','DonasiController@update');
Route::delete('/donasi/{id}','DonasiController@delete');

//route CRUD jenis_donasi
Route::get('/jenis_donasi','JenisDonasiController@index');
Route::post('/postjenis_donasi','JenisDonasiController@create');
Route::post('/jenis_donasi/{id}','JenisDonasiController@update');
Route::delete('/jenis_donasi/{id}','JenisDonasiController@delete');

//route CRUD jenis_peserta
Route::get('/jenis_donatur','JenisDonaturController@index');
Route::post('/postjenis_donatur','JenisDonaturController@create');
Route::post('/jenis_donatur/{id}','JenisDonaturController@update');
Route::delete('/jenis_donatur/{id}','JenisDonaturController@delete');

//route CRUD kegiatan
Route::get('/kegiatan','KegiatanController@index');
Route::post('/postkegiatan','KegiatanController@create');
Route::post('/kegiatan/{id}','KegiatanController@update');
Route::delete('/kegiatan/{id}','KegiatanController@delete');


//route CRUD detail Kegiatan
Route::get('/detail_kegiatan','DetailKegiatanController@index');
Route::post('/postdetail_kegiatan','DetailKegiatanController@create');
Route::post('/detail_kegiatan/{id}','DetailKegiatanController@update');
Route::delete('/detail_kegiatan/{id}','DetailKegiatanController@delete');

//route get donatur
Route::get('/getJenisDonatur','DonaturController@getJenisDonatur');