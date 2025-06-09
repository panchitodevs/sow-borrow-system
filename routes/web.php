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

// Logout route
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');
