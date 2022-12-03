<?php

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

Route::get('/', function () {
    return redirect()->route('units.index');
});


Route::resource('/units',\App\Http\Controllers\UnitsController::class);

Route::resource('/units/{unit}/subunits',\App\Http\Controllers\SubUnitsController::class);

Route::resource('/products',\App\Http\Controllers\ProductsController::class);
Route::get('/products/{product}/addQuantity',[\App\Http\Controllers\ProductsController::class,'addQuantity'])->name('products.addQuantity');
Route::post('/products/{product}/addQuantity',[\App\Http\Controllers\ProductsController::class,'addQuantityStore'])->name('products.addQuantity.store');
Route::get('/convert',[\App\Http\Controllers\UnitsController::class,'convert'])->name('convert');
