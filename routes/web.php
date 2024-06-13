<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\DashboardController;

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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/my-sales', [SalesController::class, 'my_sales'])->name('mysales')->middleware('auth');
Route::get('/my-sales/edit/{id}', [SalesController::class, 'edit'])->name('buyer.edit')->middleware('auth');
Route::post('/my-sales/edit/{id}', [SalesController::class, 'update'])->name('buyer.update')->middleware('auth');
Route::delete('/my-sales/{id}', [SalesController::class, 'destroy'])->name('buyer.destroy')->middleware('auth');
Route::post('/store', [SalesController::class, 'store'])->name('store')->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/users/create', [DashboardController::class, 'create'])->name('users.create')->middleware('auth');
Route::post('/users/create', [DashboardController::class, 'store'])->name('users.store')->middleware('auth');
Route::get('/users/{id}', [DashboardController::class, 'edit'])->name('admin.buyer.edit')->middleware('auth');
Route::get('/users/{id}/edit', [DashboardController::class, 'show'])->name('users.show')->middleware('auth');
Route::delete('/users/{id}', [DashboardController::class, 'destroy'])->name('admin.buyer.destroy')->middleware('auth');
Route::post('/users/{id}', [DashboardController::class, 'update'])->name('admin.buyer.update')->middleware('auth');
