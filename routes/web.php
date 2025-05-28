<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BorrowerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


// Show registration form
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');

// Handle registration form submission
Route::post('/register', [BorrowerController::class, 'store'])->name('register');

// Show login form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Handle login form submission
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Show home page only for authenticated users
Route::get('/home', function () {
    return view('home');
});
//->middleware('auth')->name('home');

// Redirect root to login page
Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('/apply-loan', function () {
    return 'Loan Application Page'; 
})->name('loan.apply');

Route::get('/create-investor', function () {
    return 'Investor Creation Page'; 
})->name('investor.create');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/linkage', function () {
    return view('linkage');
})->name('linkage');

Route::get('/weather', function () {
    return view('weather');
})->name('weather');
