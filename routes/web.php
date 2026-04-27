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


// Rotas de Login e logout
Route::get('/', [LoginController::class, 'showLoginScreen'])->name('login');
Route::post('/', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rota da tela de seleção de registro
Route::get('/register', [HomeController::class, 'showToSelectRegisterScreen'])->name('register');


// Rotas de cadastro
## Registro de Freelancer
Route::get('/register/freelancer', [AuthFreelancerController::class, 'showRegisterFreelancer'])->name('register.freelancer');
Route::post('/register/freelancer', [AuthFreelancerController::class, 'registerfreelancer'])->name('register.freelancer');

## Registro de Empressa
Route::get('/register/company', [AuthCompanyController::class, 'showToRegisterCompany'])->name('register.company');



Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'showToHomeScreen'])->name('home');

    Route::get('/mural', [MuralController::class, 'showToMuralScreen'])->name('mural');

    Route::get('/myjobs', [MyJobsController::class, 'showToMyJobsScreen'])->name('myjobs');

    Route::get('/walet', [WaletController::class, 'showToWaletScreen'])->name('walet');
});




// Route::get('/dashboard', function () {
//     return view('Home.Company.Dashboard');
// })->name('dashboard');