<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamMemberController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['guest'])->group(function() { 
    Route::get('/register',[RegisterController::class, 'index'])->name('register');
    Route::post('/register',[RegisterController::class, 'store'])->name('register.store');
    Route::get('/login',[LoginController::class, 'index'])->name('login');
    Route::post('/login',[LoginController::class, 'store'])->name('login.store');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::delete('/logout',LogoutController::class)->name('logout');
    Route::resource('/features',FeatureController::class);
    Route::get('/features/{feature}/status',[FeatureController::class, 'status'])->name('status.change');
    Route::resource('/team-members',TeamMemberController::class);
    Route::get('/team-members/{teamMember}/status',[TeamMemberController::class, 'status'])->name('member.status.change');
});
