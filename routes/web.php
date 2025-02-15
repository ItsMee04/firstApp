<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Master\LokasiController;
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
