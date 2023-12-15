<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::prefix('user')->name('user.')->group(function () {
    Route::match(['get', 'post'], 'login', [UserController::class, 'login'])->name('login');
});

Route::middleware(['role:2'])->group(function(){

    Route::get('user/dashboard', [UserController::class, 'userDashboard'])->name('user.dashboard');
});

Route::middleware(['role:1'])->group(function () {

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::get('/dashboard', [UserController::class, 'adminDashboard'])->name('dashboard');

        Route::prefix('users')->name('user')->group(function () {
            Route::get('/', [UserController::class, 'index']);
            Route::post('/submit', [UserController::class, 'submit'])->name('.submit');
            Route::post('/update/{user}', [UserController::class, 'update'])->name('.update');
            Route::get('/delete/{user}', [UserController::class, 'delete'])->name('.delete');
        });
    });
});
