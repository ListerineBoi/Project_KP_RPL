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

//Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'SocialAuthGoogleController@logout')->name('logout');

//control google account
Route::get('/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/callback', 'SocialAuthGoogleController@callback');


//mahasiswa
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/sk', 'pgjnController@index')->name('sk');
Route::post('/Csk', 'pgjnController@create')->name('Csk');
Route::post('/Ckp', 'kp_controller@create')->name('Ckp');
Route::post('/Cprakp', 'prakp_controller@create')->name('Cprakp');
Route::get('/kp', 'kp_controller@index')->name('kp');
Route::get('/prakp', 'prakp_controller@index')->name('prakp');
Route::get('/jadwalujian', 'jadwalujian_controller@index')->name('jadwalujian');
Route::get('/data_mhs', 'data_mhs_controller@index')->name('data_mhs');
Route::post('/Cdata_mhs', 'data_mhs_controller@create')->name('Cdata_mhs');
Route::post('/lihatM', 'lihatM_controller@index')->name('lihatM');

//dosen
Route::get('/bimbingan', 'bimbingan_controller@index')->name('bimbingan');
Route::get('/bimbinganPKP', 'bimbinganPKP_controller@index')->name('bimbinganPKP');
Route::get('/jadwalujian_dosen', 'jadwalujian_dosen_controller@index')->name('jadwalujian_dosen');
Route::get('/homeD', 'HomeDController@index')->name('homeD');
Route::get('/sk', 'pgjnController@index')->name('sk');
Route::get('/data_dosen', 'data_dosen_controller@index')->name('data_dosen');
Route::post('/Cdata_dosen', 'data_dosen_controller@create')->name('Cdata_dosen');
Route::post('/lihat', 'lihat_controller@index')->name('lihat');

//koor
Route::get('/verifikasi', 'verifikasi_controller@index')->name('verifikasi');
Route::post('/ver', 'verifikasi_controller@ver')->name('ver');
Route::post('/tolak', 'verifikasi_controller@tolak')->name('tolak');
Route::get('/verifikasi_prakp', 'verifikasi_prakp_controller@index')->name('verifikasi_prakp');
Route::post('/ver_prakp', 'verifikasi_prakp_controller@ver')->name('ver_prakp');
Route::post('/tolak_prakp', 'verifikasi_prakp_controller@tolak')->name('tolak_prakp');
Route::get('/verifikasi_sk', 'verifikasi_sk_controller@index')->name('verifikasi_sk');
Route::post('/ver_sk', 'verifikasi_sk_controller@ver')->name('ver_sk');
Route::post('/tolak_sk', 'verifikasi_sk_controller@tolak')->name('tolak_sk');
Route::get('/penjadwalanujian', 'penjadwalanujian_controller@index')->name('penjadwalanujian');
Route::post('/Cpenjadwalanujian', 'penjadwalanujian_controller@create')->name('Cpenjadwalanujian');
Route::get('/daftarregismhs', 'daftarregismhs_controller@index')->name('daftarregismhs');
Route::get('/daftarregismhsprakp', 'daftarregismhsprakp_controller@index')->name('daftarregismhsprakp');
Route::get('/periode', 'periode_controller@index')->name('periode');
Route::post('/Cperiode', 'periode_controller@create')->name('Cperiode');




