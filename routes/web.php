<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CustomerAuth\CustomerAuthController;
use App\Http\Controllers\OrderController;

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


//Customer
Route::get('/', fn() => view('customer.customer_home'))->name('customer-home');
Route::get('/login', fn() => view('customer.login'))->name('customer-login-view');
Route::post('/customer-login', [CustomerAuthController::class, 'login'])->name('customer-login');
Route::post('/customer-register', [CustomerAuthController::class, 'register'])->name('customer-register');
Route::post('customer-logout', [CustomerAuthController::class, 'logout'])->name('customer-logout');


// Admin
Route::prefix('admin')->group(function() {
    Auth::routes();
    Route::group(['middleware' => 'auth'], function() {
        Route::get('/', [AdminController::class, 'index'])->name('home');
        Route::get('/profile', [AdminController::class, 'profile'])->name('admin-profile');
        Route::get('/edit-profile', [AdminController::class, 'editProfile'])->name('admin-edit');
        Route::put('/update-profile/{id}', [AdminController::class, 'updateProfile'])->name('admin.update');

        //see registered users
        Route::resource('user', UserController::class)->only(['index', 'show']);
        Route::get('user/datatable/ssd', [UserController::class, 'ssd']);

        
        Route::resource('order', OrderController::class)->only(['index','show']);
        Route::get('order/datatable/ssd', [OrderController::class, 'ssd']);
    });
});





