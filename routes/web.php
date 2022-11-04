<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'attempt'])->name('login.attempt');
Route::middleware(['auth', 'auth.session'])->group(function() {
    Route::resource('customers', CustomerController::class)->except([
        'show',
        'destroy',
    ]);
    Route::delete('customers/{customer}', [CustomerController::class, 'destroy'])
        ->withTrashed()
        ->name('customers.destroy');

    Route::resource('products', ProductController::class)->except([
        'show',
        'destroy',
    ]);
    Route::delete('products/{product}', [ProductController::class, 'destroy'])
        ->withTrashed()
        ->name('products.destroy');
});