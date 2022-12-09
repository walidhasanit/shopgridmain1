<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopgridController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
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

Route::get('/',[ShopgridController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/add-category', [CategoryController::class, 'index'])->name('category.add');
    Route::post('/add-new-category', [CategoryController::class, 'create'])->name('category.new');
    Route::get('/manage-category', [CategoryController::class, 'manage'])->name('category.manage');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update-category/{id}', [CategoryController::class, 'update'])->name('update.category');
    Route::get('/delete-category/{id}', [CategoryController::class, 'delete'])->name('delete.category');

    Route::get('/add-sub-category', [SubCategoryController::class, 'index'])->name('sub-category.add');
    Route::post('/add-new-sub-category', [SubCategoryController::class, 'create'])->name('sub-category.new');
    Route::get('/manage-sub-category', [SubCategoryController::class, 'manage'])->name('sub-category.manage');
    Route::get('/edit-sub-category/{id}', [SubCategoryController::class, 'edit'])->name('sub-category.edit');
    Route::post('/update-sub-category/{id}', [SubCategoryController::class, 'update'])->name('sub-category.update');
    Route::get('/delete-sub-category/{id}', [SubCategoryController::class, 'delete'])->name('sub-category.delete');

    Route::get('/add-unit', [UnitController::class, 'index'])->name('unit.add');
    Route::post('/add-new-unit', [UnitController::class, 'create'])->name('unit.new');
    Route::get('/manage-unit', [UnitController::class, 'manage'])->name('unit.manage');
    Route::get('/edit-unit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
    Route::post('/update-unit/{id}', [UnitController::class, 'update'])->name('unit.update');
    Route::get('/delete-unit/{id}', [UnitController::class, 'delete'])->name('unit.delete');

    Route::get('/add-brand', [BrandController::class, 'index'])->name('brand.add');
    Route::post('/add-new-brand', [BrandController::class, 'create'])->name('brand.new');
    Route::get('/manage-brand', [BrandController::class, 'manage'])->name('brand.manage');
    Route::get('/edit-brand/{id}', [BrandController::class, 'edit'])->name('edit.brand');
    Route::post('/update-brand/{id}', [BrandController::class, 'update'])->name('update.brand');
    Route::get('/delete-brand/{id}', [BrandController::class, 'delete'])->name('delete.brand');

    Route::get('/add-product', [ProductController::class, 'index'])->name('product.add');
    Route::get('/get-sub-category-by-category', [ProductController::class, 'getSubCategory'])->name('getSubCategory');
    Route::post('/add-new-product', [ProductController::class, 'create'])->name('product.new');
    Route::get('/manage-product', [ProductController::class, 'manage'])->name('product.manage');



});
