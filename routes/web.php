<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Roles\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Orders\OrderController;
use App\Http\Controllers\Roles\RoleManagementController;

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

Route::group(['middleware' => ['auth:web', 'verified']], function() {
        Route::resource('roles', RolesController::class);
        Route::resource('products', ProductController::class);
        Route::resource('orders', OrderController::class);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/manage', function () {
    return 'Hello World';
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
