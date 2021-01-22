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
    $title = 'Sangcahaya.com | PPDB';
    return view('welcome',compact('title'));
});

Route::get('keluar',function(){
    \Auth::logout();
    return redirect('/');
});

Route::get('ppdb','Ppdb_controller@index');
Route::post('ppdb','Ppdb_controller@store');

Route::group(['middleware'=>'auth'],function(){

    Route::get('dashboard','Dashboard\Beranda_controller@index');

    Route::get('biodata','Dashboard\Biodata_controller@index');
    Route::post('biodata/{users}','Dashboard\Biodata_controller@store');
    Route::put('biodata/{users}','Dashboard\Biodata_controller@update');

    // cetak biodata
    Route::get('cetak-biodata','Dashboard\Biodata_controller@cetak');

    // verifikasi peserta
    Route::get('verifikasi','Dashboard\Verifikasi_controller@index');
    Route::post('verifikasi','Dashboard\Verifikasi_controller@verifikasi');

    // Data peserta
    Route::get('peserta','Dashboard\Peserta_controller@index');
    Route::get('peserta/verifikasi','Dashboard\Peserta_controller@diverifikasi');
    Route::get('peserta/belum-verifikasi','Dashboard\Peserta_controller@belum_verifikasi');

});

Auth::routes();

Route::get('/home', function(){
    return redirect('dashboard');
});
