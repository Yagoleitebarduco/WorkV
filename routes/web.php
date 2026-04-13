<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AuthFreelancerController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/register/freelancer', 
    [AuthFreelancerController::class, 'showRegisterFreelancer']
)->name('freelancer');

Route::post('/register/freelancer', 
    [AuthFreelancerController::class, 'registerfreelancer']
)->name('register.freelancer');
