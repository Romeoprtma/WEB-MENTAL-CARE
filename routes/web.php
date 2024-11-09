<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('components.home');
});

Route::get('/admin', function () {
    return view('components.homeAdmin');
});

Route::get('/meditasi', function () {
    return view('components.meditasi');
});
