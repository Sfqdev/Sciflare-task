<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleUserController;

use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\CategoryController as NonAPICategoryController;
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

Route::get('/', function () {
    return view('/login/index');
});

Route::get('/home', function () {
    return view('home');
});

Route::middleware("admin")->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/{id}', [UserController::class, 'index']);
    Route::get('/users/{user}/edit', [UserController::class, 'edit']);
    Route::post('/users/{user}/update', [UserController::class, 'update']);
    Route::get('/organization', [OrganizationController::class, 'index']);
});

Route::middleware("guest")->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
    Route::post('/register', [RegisterController::class, 'store']);
    
    Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::get('/profile', [UserController::class, 'profile']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard', function () {
    return view('dashboard');
});

