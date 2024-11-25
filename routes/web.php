<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomAuthController;

use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile/{id}', [UserController::class, 'showProfile'])->name('profile.show');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
});