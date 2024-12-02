<?php

use App\Http\Controllers\AbsensimahasiswaController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('absensidosen',[AbsensimahasiswaController::class,'index']);
Route::post('absensidosen',[AbsensimahasiswaController::class,'store']);
Route::get('absensidosen',[AbsensidosenController::class,'index']);
Route::post('absensidosen',[AbsensidosenController::class,'store']);
