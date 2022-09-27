<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


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


Route::get('/', fn() => view('customer.customer_home'));

Route::prefix('admin')->group(function() {
    Auth::routes();
    Route::group(['middleware' => 'auth', 'name' => 'admin.'], function() {
        Route::get('/', [AdminController::class, 'index'])->name('home');
    });
    // Route::middleware('auth')->group(function() {

    //     // Route::get('/', [HomeController::class, 'index'])->name('home');
    // });
});

// Admin-Category
Route::resource('category', CategoryController::class);
Route::get('/category/delete/{id}',[CategoryController::class,'destroy'])->name('category.destroy');
Route::get('/edit/category။{id}',[CategoryController::class,'edit']);





