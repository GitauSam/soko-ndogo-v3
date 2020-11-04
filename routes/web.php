<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Roles\RolesController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Orders\OrderController;
use App\Http\Controllers\Roles\RoleManagementController;
use App\Http\Controllers\Users\UserController;

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

Route::group(['middleware' => ['auth:sanctum', 'auth:web', 'verified']], function() {
        Route::resource('roles', RolesController::class);
        Route::resource('products', ProductController::class);
        Route::resource('orders', OrderController::class);
        Route::resource('users', UserController::class);
        Route::get('/roles/assign/{id}', 'App\Http\Controllers\Roles\RoleManagementController@getAssignRoles')
            ->name('get.assign.roles');
        Route::post('/roles/assign-role', 'App\Http\Controllers\Roles\RoleManagementController@assignRoles')
                    ->name('assign.roles');
        Route::get('/dashboard', 'App\Http\Controllers\Dashboard\DashboardController@getDashboard')
                    ->name('dashboard');
});

Route::get('/', function () { return view('welcome'); })->name('welcome');

// Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


