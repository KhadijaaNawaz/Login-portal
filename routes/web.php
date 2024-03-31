<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\PController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout'); 
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/registerUser', [AuthController::class, 'registerUser'])->name('registerUser');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/Accountmanagment', [AccountController::class, 'view'])->name('Accountmanagment');
    Route::post('/update_password', [AccountController::class, 'updatePassword'])->name('update_password');
    Route::post('/delete_account', [AccountController::class, 'deleteAccount'])->name('delete_account');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('students', StudentController::class)->except(['show']);

});



