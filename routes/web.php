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

Route::get('/tesKepribadian', function () {
    return view('components.tesKepribadian');
});
Route::get('/psikolog', function(){
    return view('components.listPsikolog');
});
Route::get('/psikolog/chat', function(){
    return view('components.chat');
});
