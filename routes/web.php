<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProductModelController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\InventoryController;
//use App\Http\Controllers'UserController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
     ->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
     ->name('home')->middleware('auth');

Route::resource('/vendors', VendorController::class);

Route::resource('/catagories', CatagoryController::class);

Route::resource('/productModels', ProductModelController::class);

Route::resource('/materials', MaterialController::class);

Route::resource('/inventories', InventoryController::class);
