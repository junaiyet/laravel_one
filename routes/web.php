<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\SubCategoryController;
use Faker\Guesser\Name;

Auth::routes();

Route::get('/',  [FrontEndController::class, 'welcome']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

// user
Route::get('/users', [HomeController::class, 'users'])->name('users');
// user delete
Route::get('/delete/user/{user_id}', [HomeController::class, 'delete'])->name('delete.user');

// Category
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/edit/{catagory_id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update', [CategoryController::class, 'update'])->name('category.update');

Route::get('/category/delete/{category_id}', [CategoryController::class, 'delete'])->name('category.delete');

Route::get('/category/restore/{category_id}', [CategoryController::class, 'restore'])->name('category.restore');
Route::get('/category/forced/delete/{category_id}', [CategoryController::class, 'forced_delete'])->name('category.forced.delete');

Route::post('/category/marked/delete', [CategoryController::class, 'mark_delete'])->name('category.marked');
// subcategory
Route::get('/subcategory', [SubCategoryController::class, 'index'])->name('subcategory');
Route::post('/subcategory/store', [SubCategoryController::class, 'store'])->name('subcategory.store');


Route::get('/subcategory/forced/delete/{subcatagory_id}', [SubCategoryController::class, 'forced_delete'])->name('subcategory.forced.delete');

// Route::get('/subcategory/edit/{category_id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
