<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    if (!Auth::user()) {
        return redirect()->route('user.login');
    }else {
        if (Auth::user()->role == 1) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
        
    }
    return redirect();
});

Route::prefix('user')->name('user.')->group(function () {
    Route::match(['get', 'post'], 'login', [UserController::class, 'login'])->name('login');
});

Route::middleware(['role:2'])->group(function(){

    Route::prefix('user')->name('user.')->group(function(){
        Route::get('/dashboard', [UserController::class, 'userDashboard'])->name('dashboard');
        Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    });

    Route::prefix('product')->name('product.')->group(function(){
        Route::get('/', [ProductController::class,'index'])->name('index');
        Route::get('/add', [ProductController::class,'add'])->name('add');
        Route::post('/submit', [ProductController::class,'submit'])->name('submit');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');
        Route::post('/update', [ProductController::class, 'update'])->name('update');
    });
});

Route::middleware(['role:1'])->group(function () {

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::get('/dashboard', [UserController::class, 'adminDashboard'])->name('dashboard');
        Route::get('/logout', [UserController::class, 'logout'])->name('logout');


        Route::prefix('users')->name('user')->group(function () {
            Route::get('/', [UserController::class, 'index']);
            Route::post('/submit', [UserController::class, 'submit'])->name('.submit');
            Route::post('/update/{user}', [UserController::class, 'update'])->name('.update');
            Route::get('/delete/{user}', [UserController::class, 'delete'])->name('.delete');
        });

        Route::prefix('category')->name('category')->group(function(){
            Route::get('/', [CategoryController::class, 'index']);
            Route::post('/submit', [CategoryController::class, 'submit'])->name('.submit');
            Route::post('/update/{category}', [CategoryController::class, 'update'])->name('.update');
            Route::get('/delete/{category}', [CategoryController::class, 'delete'])->name('.delete');
        });

        Route::prefix('supplier')->name('supplier')->group(function(){
            Route::get('/', [SupplierController::class, 'index']);
            Route::post('/submit', [SupplierController::class, 'submit'])->name('.submit');
            Route::post('/update/{supplier}', [SupplierController::class, 'update'])->name('.update');
            Route::get('/delete/{supplier}', [SupplierController::class, 'delete'])->name('.delete');
        });
        
    });
});
