<?php

use App\Http\Controllers\AbsensiController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('absensi',[AbsensiController::class,'index']);
Route::post('absensi',[AbsensiController::class,'store']);
