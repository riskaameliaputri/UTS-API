<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); // atau nama view lain sesuai dengan yang ada di resources/views
});

