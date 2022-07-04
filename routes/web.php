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

Route::get('/posts', function () {
    return view('index');
});

Route::get('/masterpasien', function () {
    return view('pasien');
});

Auth::routes();

Route::get('/masterpasien', [App\Http\Controllers\PasienController::class, 'show'])->name('showdata');
Route::post('/masterpasien', [App\Http\Controllers\PasienController::class, 'store'])->name('pasien.storepasien');

