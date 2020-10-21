<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Roles\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Orders\OrderController;

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

// Auth::routes();

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    Route::resource('roles', RolesController::class);
});

Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
