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



Auth::routes();

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Route::get('/linkstorage', [App\Http\Controllers\RouteController::class, 'symlink'])->name('symlink');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\RouteController::class, 'welcomePage'])->name('welcome');

use App\Http\Controllers\ProductsController;
Route::resource('/products', ProductsController::class);

use App\Http\Controllers\ImagesProductController;
Route::resource('/product-images', ImagesProductController::class);
Route::get('/manage-images', [App\Http\Controllers\ImagesProductController::class,'manageProductImages'])->name('manage.product-images');
