<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\MBTIController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\riviewController;
use App\Http\Controllers\MeditasiController;
use App\Http\Controllers\PsikologController;
use App\Http\Controllers\viewController;
use App\Livewire\UserChart;
use Illuminate\Support\Facades\Route;

Route::get('/',[viewController::class ,'viewHome']);

Route::get('/listPsikolog',[viewController::class, 'viewListPsikolog']);

Route::get('/userChart', UserChart::class);

Route::get('/tesKepribadian', [MBTIController::class, 'mbti'])->name('mbti');

Route::get('/printTes', [MBTIController::class, 'printTes']);

// Login Admin
Route::get('/loginAdmin', [loginController::class, 'showLoginAdmin'])->name('loginAdmin');
Route::post('/loginAdmin', [loginController::class, 'loginAdmin']);

// register admin
Route::get('/registerAdmin', [loginController::class, 'showRegisterAdmin'])->name('registerAdmin');
Route::post('/registerAdmin', [loginController::class, 'registerAdmin']);

// Menampilkan halaman login
Route::get('/login', [loginController::class, 'showLogin'])->name('login');

Route::post('/logout', [loginController::class, 'logout']);

// Mengelola login dan registrasi
Route::post('/auth', [loginController::class, 'handleAuth']);


Route::middleware(['auth','user-access:user'])->prefix('user')->group(function(){
    Route::post('/home', [riviewController::class, 'store'])->name('reviews.store');
    Route::get('/home',[viewController::class ,'viewHome'])->name('user.home');

    Route::get('/meditasi',[viewController::class, 'viewMeditasi']);

    Route::get('/tesKepribadian', [MBTIController::class, 'mbti'])->name('mbti');
    Route::post('/submit-answers', [MBTIController::class, 'submitAnswers'])->name('submit.answers');

    Route::get('/listPsikolog',[viewController::class, 'viewListPsikolog']);

    // mengatur profile
    Route::get('/profile', [profileController::class, 'viewProfile'])->name('viewProfile');
    Route::put('/profile', [profileController::class, 'updateProfile'])->name('updateProfile');

    Route::get('/chat', [viewController::class,'viewChat']);
});



Route::middleware(['auth','user-access:psikolog'])->prefix('psikolog')->group(function(){
    Route::get('/home',[viewController::class ,'viewHome']);
    Route::get('/meditasi',[viewController::class, 'viewMeditasi']);
    Route::get('/tesKepribadian', [viewController::class, 'viewTesKepribadian']);

    Route::get('/profile', [profileController::class, 'viewProfile'])->name('viewProfile');
    Route::put('/profile', [profileController::class, 'updateProfile'])->name('updateProfile');
    
    Route::get('/chat', [viewController::class,'viewChat']);
});

Route::middleware(['auth','user-access:admin'])->prefix('admin')->group(function(){
    Route::get('/homeAdmin',[Admin::class ,'index'])->name('homeAdmin.index');
    Route::get('/kelolaUser',[Admin::class ,'kelolaUser'])->name('admin.index');
    Route::delete('/admin/delete/{id}', [Admin::class, 'deleteUser'])->name('admin.delete');

    Route::resource('kelolaPsikolog', PsikologController::class);
    Route::resource('kelolaMeditasi', MeditasiController::class);

    // Register Admin
    Route::get('/registerAdmin', [loginController::class, 'showRegisterAdmin'])->name('registerAdmin');
    Route::post('/registerAdmin', [loginController::class, 'registerAdmin']);
});
