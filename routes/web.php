<?php

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

Route::redirect('/', 'login');

Route::middleware('auth')->group(function() {
    Route::get('products', [\App\Http\Controllers\ProductController::class, 'index'])->name('products.index');

   Route::middleware('is_admin')->group(function() {
       Route::get('products/create', [\App\Http\Controllers\ProductController::class, 'create'])
            ->name('products.create');
       Route::post('products', [\App\Http\Controllers\ProductController::class, 'store'])
           ->name('products.store');
       Route::get('products/{product}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])
           ->name('products.edit');
       Route::put('products/{product}', [\App\Http\Controllers\ProductController::class, 'update'])
            ->name('products.update');
       Route::delete('products/{product}', [\App\Http\Controllers\ProductController::class, 'destroy'])
           ->name('products.destroy');
   });
});


Auth::routes();
