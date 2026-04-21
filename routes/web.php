<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AuthFreelancerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;


Route::get('/', [LoginController::class, 'showLoginScreen'])->name('login');
Route::post('/', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register/freelancer', 
    [AuthFreelancerController::class, 'showRegisterFreelancer']
)->name('register.freelancer');
Route::post('/register/freelancer', 
    [AuthFreelancerController::class, 'registerfreelancer']
)->name('register.freelancer');



Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'showToHomeScreen'])->name('home');
});
