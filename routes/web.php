<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\LinkageController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\MarketInsightController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoaningController;
use App\Http\Controllers\VestmentController;
use App\Http\Controllers\ProfileController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

// Show login form
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Handle login
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

// Show registration form
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

// Handle registration
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

// home route
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home'); 

//weater route
Route::get('/weather', [WeatherController::class, 'index'])->name('weather');

//linkage route
Route::get('/linkage', [LinkageController::class, 'index'])->name('linkage');

//about us route
Route::get('/about', [AboutController::class, 'index'])->name('about');

//loan route
Route::middleware(['auth'])->group(function() {
    Route::get('/loans', [LoanController::class, 'create'])->name('loans.create');
    Route::post('/loans', [LoanController::class, 'store'])->name('loans.store');
});

//investments route
Route::middleware(['auth'])->group(function() {
    Route::get('/investments', [InvestmentController::class, 'create'])->name('investments.create');
    Route::post('/investments', [InvestmentController::class, 'store'])->name('investments.store');
});

//Market Insight route 
Route::get('/market-insights', [MarketInsightController::class, 'index'])->name('market.insights');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/loaning', [LoaningController::class, 'index'])->name('loaning.index');
    Route::post('/loaning', [LoaningController::class, 'store'])->name('loaning.store');
    Route::get('/loaning/{id}/edit', [LoaningController::class, 'edit'])->name('loaning.edit');
    Route::patch('/loaning/{id}', [LoaningController::class, 'update'])->name('loaning.update');
    Route::delete('/loaning/{id}', [LoaningController::class, 'destroy'])->name('loaning.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/vest', [VestmentController::class, 'index'])->name('vest.index');
    Route::post('/vest', [VestmentController::class, 'store'])->name('vest.store');
    Route::get('/vest/{id}/edit', [VestmentController::class, 'edit'])->name('vest.edit');
    Route::put('/vest/{id}', [VestmentController::class, 'update'])->name('vest.update');
    Route::delete('/vest/{id}', [VestmentController::class, 'destroy'])->name('vest.destroy');
});

//Profile route
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});


// Logout route
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');
