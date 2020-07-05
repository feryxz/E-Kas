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

Route::get('/', function () {
    return redirect('/dashboard');
});

Auth::routes([
]);

Route::get('/home', function () {
    return redirect('/dashboard');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('home');
    Route::get('/siswa/export_excel', 'SiswaController@export_excel')->name('siswa-export-excel');
    Route::get('/siswa/export_pdf', 'SiswaController@export_pdf')->name('siswa-export-pdf');
    Route::resource('/siswa', 'SiswaController');
    Route::resource('/kelas', 'KelasController');
    Route::get('/tabungan', 'TabunganController@index')->name('tabungan');
    Route::resource('/transaksi', 'TransaksiController');
    Route::get('/transaksi/rekap', 'TabunganController@index')->name('transaksi.rekap');
    Route::get('/panduan', 'PanduanController@index')->name('panduan');
    Route::get('/profile', 'HomeController@profile')->name('profile');
    Route::get('/user', 'HomeController@user')->name('user');
    Route::post('/profile/store', 'HomeController@profile_update')->name('profile.store');

    Route::get('/user/export_pdf', 'HomeController@user_export_pdf')->name('user-export-pdf');
});
