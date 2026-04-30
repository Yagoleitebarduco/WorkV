<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AuthFreelancerController;
use App\Http\Controllers\AuthCompanyController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MuralController;
use App\Http\Controllers\MyJobsController;
use App\Http\Controllers\WaletController;
use App\Http\Controllers\WorksController;


// Rotas de Login e logout
Route::get('/', [LoginController::class, 'showLoginScreen'])->name('login');
Route::post('/', [LoginController::class, 'login']);
Route::get('/company/login', [LoginController::class, 'showCompanyLoginScreen'])->name('company.login');
Route::post('/company/login', [LoginController::class, 'loginCompany'])->name('company.login.perform');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rota da tela de seleção de registro
Route::get('/register', [HomeController::class, 'showToSelectRegisterScreen'])->name('register');


// Rotas de cadastro
## Registro de Freelancer
Route::get('/register/freelancer', [AuthFreelancerController::class, 'showRegisterFreelancer'])->name('register.freelancer');
Route::post('/register/freelancer', [AuthFreelancerController::class, 'registerfreelancer'])->name('register.freelancer');

## Registro de Empressa
Route::get('/register/company', [AuthCompanyController::class, 'showToRegisterCompany'])->name('register.company');
Route::post('/register/company', [AuthCompanyController::class, 'registerCompany'])->name('register.company');



Route::middleware('auth:web')->group(function () {
    // User
    Route::get('/user/home', [HomeController::class, 'showToHomeScreen'])->name('home');
    Route::get('/user/mural', [MuralController::class, 'showToMuralScreen'])->name('mural');
    Route::get('/user/myjobs', [MyJobsController::class, 'showToMyJobsScreen'])->name('myjobs');
    Route::get('/user/walet', [WaletController::class, 'showToWaletScreen'])->name('walet');
});

Route::middleware(['auth:company'])->group(function () {
    // Company
    Route::get('/company/dashboard', [HomeController::class, 'showToDashboardCompanyScreen'])->name('company.dashboard');

    Route::get('/company/newwork', [MuralController::class, 'showToNewWorkScreen'])->name('company.newWork');
    Route::post('/company/newwork', [MuralController::class, 'storeNewWork']);
});