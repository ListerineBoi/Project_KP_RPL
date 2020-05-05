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
    return view('welcome');
});

//Auth::routes();

Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//control google account
Route::get('/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/callback', 'SocialAuthGoogleController@callback');

//home
Route::get('/home', 'HomeController@index')->name('home');

//mahasiswa
Route::get('/sk', 'pgjnController@index')->name('sk');
Route::get('/kp', 'kp_controller@index')->name('kp');
Route::get('/prakp', 'prakp_controller@index')->name('prakp');
Route::get('/jadwalujian', 'jadwalujian_controller@index')->name('jadwalujian');

//dosen
Route::get('/bimbingan', 'bimbingan_controller@index')->name('bimbingan');
Route::get('/jadwalujian_dosen', 'jadwalujian_dosen_controller@index')->name('jadwalujian_dosen');

//koor
Route::get('/verifikasi', 'verifikasi_controller@index')->name('verifikasi');
Route::get('/penjadwalanujian', 'penjadwalanujian_controller@index')->name('penjadwalanujian');
Route::get('/daftarregismhs', 'daftarregismhs_controller@index')->name('daftarregismhs');





