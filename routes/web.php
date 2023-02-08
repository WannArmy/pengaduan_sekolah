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

Auth::routes(['register' => false]);
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('siswa', 'SiswaController');
Route::resource('kategori', 'KategoriController');
Route::resource('pengaduan', 'PengaduanController');
Route::resource('aspirasi', 'AspirasiController');
Route::get('/profil', 'PengaduanController@profil');
Route::get('/welcome', 'PengaduanController@welcome');
