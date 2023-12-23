<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\Dashboard;
use App\http\Controllers\CategoryController;
use App\http\Controllers\ProductController;
use App\http\Controllers\SubCategoryController;

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
Route::get('/dashboard', [Dashboard::class, 'dashboard']);

// Category crud
Route::get('/allCategory', [CategoryController::class, 'allCategory'])->name('all.category');
Route::get('/addCategory', [CategoryController::class, 'addCategory']);
Route::post('/storeCategory', [CategoryController::class, 'storeCategory'])->name('store.category');
Route::get('/deleteCategory/{id}' ,[CategoryController::class, 'deleteCategory'])->name('delete.category');
Route::get('/editCategory/{id}', [CategoryController::class, 'editCategory'])->name('edit.category');
Route::post('/updateCategory', [CategoryController::class, 'updateCategory'])->name('update.category');


// subCategory crud
Route::get('/addSubCategory', [SubCategoryController::class, 'addSubCategory']);
Route::get('/allSubCategory', [SubCategoryController::class, 'allSubCategory'])->name('all.SubCategory');
Route::post('/storeSubCategory', [SubCategoryController::class, 'storeSubCategory'])->name('store.SubCategory');
Route::get('/deleteSubCategory/{id}' ,[SubCategoryController::class, 'deleteSubCategory'])->name('delete.SubCategory');
Route::get('/editSubCategory/{id}', [SubCategoryController::class, 'editSubCategory'])->name('edit.SubCategory');
Route::post('/updateSubCategory', [SubCategoryController::class, 'updateSubCategory'])->name('update.SubCategory');
Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'getSubCategory']);


// Product crud
Route::get('/addProduct', [ProductController::class, 'addProduct']);
Route::get('/allProduct', [ProductController::class, 'allProduct'])->name('all.Product');
Route::post('/storeProduct', [ProductController::class, 'storeProduct'])->name('store.Product');
Route::get('/deleteProduct/{id}' ,[ProductController::class, 'deleteProduct'])->name('delete.Product');
Route::get('/editProduct/{id}', [ProductController::class, 'editProduct'])->name('edit.Product');
Route::post('/updateProduct', [ProductController::class, 'updateProduct'])->name('update.Product');
