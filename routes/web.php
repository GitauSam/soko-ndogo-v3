<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Roles\RolesController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Orders\OrderController;
use App\Http\Controllers\Roles\RoleManagementController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Admin\AdminController;

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
    // Purchase products routes
    Route::get('/non-purchased-products', 'App\Http\Controllers\Admin\AdminController@indexNonPurchasedProducts')
                ->name('non-purchased-products');
    Route::get('/proceed-to-purchase-product/{id}', 'App\Http\Controllers\Admin\AdminController@getPurchasedProduct')
                ->name('proceed.to.purchase.product');
    Route::get('/purchase-product/{id}', 'App\Http\Controllers\Admin\AdminController@purchaseProduct')
                ->name('purchase.product');
    Route::get('/purchased-products', 'App\Http\Controllers\Admin\AdminController@purchasedProducts')
                ->name('purchased-products');

    // Service orders routes
    Route::get('/non-serviced-orders', 'App\Http\Controllers\Admin\AdminController@indexNonServicedOrders')
                ->name('non-serviced-orders');
    Route::get('/proceed-to-service-orders/{id}', 'App\Http\Controllers\Admin\AdminController@getServiceOrder')
                ->name('proceed.to.service.order');
    Route::get('/service-order/{id}', 'App\Http\Controllers\Admin\AdminController@serviceOrder')
                ->name('service.order');
    Route::get('/serviced-orders', 'App\Http\Controllers\Admin\AdminController@servicedOrders')
                ->name('serviced-orders');
        
});

Route::get('/', function () { return view('welcome'); })->name('welcome');


