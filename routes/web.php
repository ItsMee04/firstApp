<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Master\LokasiController;
use App\Http\Controllers\Master\TipeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', [AuthController::class, 'index']);

Route::get('/dashboard', function () {
    return view("Pages.dashboard");
});

Route::get('/lokasi', function () {
    return view("Pages.Master.lokasi");
});
Route::get('/lokasi/getLokasi', [LokasiController::class, 'loadLokasi']);
Route::post('/lokasi', [LokasiController::class, 'store']);
Route::get('/lokasi/{id}', [LokasiController::class, 'show']);
Route::post('/lokasi/{id}', [LokasiController::class, 'update']);
Route::delete('/lokasi/delete/{id}', [LokasiController::class, 'delete']);

Route::get('/tipe', function () {
    return view('Pages.Master.tipe');
});
Route::get('/tipe/getTipe', [TipeController::class, 'getTipe']);
Route::post('/tipe', [TipeController::class, 'store']);
Route::get('/tipe/{id}', [TipeController::class, 'show']);
Route::post('/tipe/{id}', [TipeController::class, 'update']);
Route::delete('/tipe/delete/{id}', [TipeController::class, 'delete']);
