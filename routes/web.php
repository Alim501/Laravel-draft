<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/products',[ProductController::class, 'showAll'])->name('products');
Route::get('/products/{cat}',[ProductController::class, 'category'])->name('category');
Route::get('/products/{cat}/{product_id}',[ProductController::class, 'showOne'])->name('showOne');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin',[AdminController::class, 'index']);
    Route::get('/admin/category',[CategoryController::class, 'index'])->name('category.index');
    Route::get('/admin/category/create',[CategoryController::class, 'create'])->name('category.create');
    Route::post('/admin/category',[CategoryController::class, 'store'])->name('category.store');
    Route::get('/admin/category/{category_id}/edit',[CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/admin/category/{category_id}',[CategoryController::class, 'update'])->name('category.update');
    Route::delete('/admin/category/{category_id}',[CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/admin/product/create',[ProductController::class, 'create'])->name('product.create');
    Route::post('/admin/product',[ProductController::class, 'store'])->name('product.store');
    Route::get('/admin/product/{product_id}/edit',[ProductController::class, 'edit'])->name('product.edit');
    Route::put('/admin/product/{proudct_id}',[ProductController::class, 'update'])->name('product.update');
    Route::delete('/admin/product/{product_id}',[ProductController::class, 'destroy'])->name('product.destroy');
});

require __DIR__.'/auth.php';
