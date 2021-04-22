<?php

use Illuminate\Support\Facades\Route;
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

/*Route::get('/test', 'TestController@index');*/
//Route::get('/test','app\Http\Controllers\TestController@index');



Route::get('/', 'AuthController@showFormLogin')->name('login');
Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');
Route::get('register', 'AuthController@showFormRegister')->name('register');
Route::post('register', 'AuthController@register');

Route::group(['middleware' => 'auth'], function () {

    Route::get('home', 'DashboardController@index')->name('home');
    Route::get('logout', 'AuthController@logout')->name('logout');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    //Surat Masuk
    Route::get('suratmasuk', 'SuratmasukController@index')->name('suratmasuk');
    Route::get('tsuratmasuk', 'SuratmasukController@create')->name('tsuratmasuk');
    Route::get('suratmasuk/teregistrasi','SuratmasukController@teregistrasi')->name('sm-teregistrasi');
    Route::get('suratmasuk/waiting','SuratmasukController@waiting')->name('sm-waiting');
    Route::get('suratmasuk/terdesposisi','SuratmasukController@terdesposisi')->name('sm-terdesposisi');
    Route::get('suratmasuk/arsipwait','SuratmasukController@arsipWait')->name('sm-arsipwait');
    Route::get('suratmasuk/diarsipkan','SuratmasukController@diarsipkan')->name('sm-diarsipkan');
    Route::get('suratmasuk/selesai','SuratmasukController@selesai')->name('sm-selesai');
    Route::get('aktifitas/{suratmasuk}','SuratmasukController@aktifitas')->name('sm-track');

//Sistem
    Route::get('pengguna', 'PenggunaController@index')->name('pengguna');
    Route::get('bidang', 'BidangController@index')->name('bidang');
    Route::get('subbidang', 'SubbidangController@index')->name('subbidang');
    Route::post('subbidang', 'SubbidangController@store')->name('add-subbidang');


    /*Route::get('suratmasuk', function () {
        return view('dashboard/suratmasuk');
    });*/

    //Sekum
    Route::get('suratmasuksekum','SekumController@home')->name('sm-sekum');
    Route::get('sekum/desposisi','SekumController@list')->name('sm-sekum-desposisi');
    Route::get('sekum/selesai','SekumController@selesai')->name('sm-sekum-selesai');





    Route::get('dismasuk', function () {
    return view('dashboard/dismasuk');
});

Route::get('diskeluar', function () {
    return view('dashboard/diskeluar');
});

Route::get('suratkeluar', function () {
    return view('dashboard/suratkeluar');
});
Route::get('tsuratkeluar', function () {
    return view('dashboard/tsuratkeluar');
});
Route::get('expedisi', function () {
    return view('dashboard/expedisi');
});


//report
Route::get('rsuratmasuk', function () {
    return view('dashboard/report/rsuratmasuk');
});
Route::get('rsuratkeluar', function () {
    return view('dashboard/report/rsuratkeluar');
});
Route::get('rexpedisi', function () {
    return view('dashboard/report/rexpedisi');
});

Route::get('konsep', function () {
    return view('sekum/konsep');
});


});

Route::get('backup', function () {
    return view('dashboard/backup');
});

//Route::get('/coba','CobaController@index');

/*Route::get('/', function () {
    return view('dashboard/dashboard');
});
*/

//sekum

Route::get('suratkeluarsekum', function () {
    return view('sekum/suratkeluarsekum');
});


//subBidang
Route::post('subcat', 'SuratmasukController@subCat')->name('subcat');
