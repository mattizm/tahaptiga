<?php

use App\Http\Controllers\ProcessController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValidasiController;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::get('/countdown', function(){
  return view('countdown');
});

Route::get('/caritahap3', [ProcessController::class, 'caritahap3'])->name('caritahap3');
Route::post('/createtahap3', [ProcessController::class, 'createtahap3'])->name('createtahap3');
Route::post('/storetahap3', [ProcessController::class, 'storetahap3'])->name('storetahap3');

Route::get('/', [ProcessController::class, 'caritahap3']);
Route::get('/dashboard', [ProcessController::class, 'index'])->middleware('auth')->name('dashboard');

Route::controller(UserController::class)->prefix('pengguna')->middleware('auth')->group(function () {
  Route::post('/save', 'save')->name('user.save');
  Route::post('/update/{id}', 'update')->name('user.update');
  Route::post('/delete/{id}', 'delete')->name('user.delete');
});

Route::controller(ProcessController::class)->prefix('mahasiswa')->middleware('auth')->group(function () {
  Route::get('/home', 'index')->name('home');
  Route::get('/', 'index')->name('mahasiswa.index');
  Route::post('/update', 'update')->name('mahasiswa.update');
  Route::post('/import', 'import')->name('import');
  Route::post('/ekspor', 'ekspor')->name('ekspor');
});

Route::controller(ValidasiController::class)->prefix('validasi')->middleware(['auth','role:10,20,30'])->group(function () {
  Route::get('/{status}', 'index')->name('validasi.index');
  Route::get('/editdata/{id}', 'editdata')->name('validasi.editdata');
  Route::post('/storedata/{id}', 'storedata')->name('validasi.storedata');
  Route::post('/update/{id}', 'update')->name('validasi.update');
});
