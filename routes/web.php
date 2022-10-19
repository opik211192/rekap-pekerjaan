<?php

use App\Http\Controllers\BangunanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    //return view('welcome');
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->prefix('paket')->group(function(){
    Route::get('', [PaketController::class, 'index'])->name('paket.index');
    Route::get('/create', [PaketController::class, 'create'])->name('paket.create');
    Route::post('/create', [PaketController::class, 'store']);
    Route::get('/edit/{paket}', [PaketController::class, 'edit'])->name('paket.edit');
    Route::put('/edit/{paket}', [PaketController::class, 'update']);
    Route::delete('/{paket}', [PaketController::class, 'delete'])->name('paket.delete');
});

Route::middleware('auth')->prefix('bangunan')->group(function(){
    Route::get('', [BangunanController::class, 'index'])->name('bangunan.index');
    Route::get('/create', [BangunanController::class, 'create'])->name('bangunan.create');
    Route::post('/create', [BangunanController::class, 'store']);
    Route::get('/edit/{bangunan}', [BangunanController::class, 'edit'])->name('bangunan.edit');
    Route::put('/edit/{bangunan}', [BangunanController::class, 'update']);
    Route::delete('/{bangunan}', [BangunanController::class, 'delete'])->name('bangunan.delete');
});

Route::middleware('auth')->prefix('laporan')->group(function(){
    Route::get('', [LaporanController::class, 'index'])->name('laporan.index');
    Route::post('/cetak', [LaporanController::class, 'cetak'])->name('laporan.cetak');
});

Route::middleware('auth')->prefix('user')->group(function(){
    Route::get('', [UserController::class, 'index'])->name('user.index');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/edit/{user}', [UserController::class, 'update']);
    
    //ubah password
    Route::get('/ubah-password', [UserController::class, 'ubahPassword'])->name('user.ubah.password');
    Route::post('/ubah-password', [UserController::class, 'updatePassword']);
});
