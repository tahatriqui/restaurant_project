<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\visitorController;
use App\Models\Category;
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

Route::get('/',[visitorController::class,'index'])->name('Vpage');

Auth::routes();

Route::get('/home', [HomeController::class,'index'])->name('home');

//categories
Route::get('/category',[CategoryController::class,'show'])->name('cat.show');

Route::post('/category/store',[CategoryController::class,'store'])->name('cat.store');

Route::get('/category/{id}',[CategoryController::class,'delete'])->name('cat.delete');

Route::post('/category/update', [CategoryController::class, 'update'])->name('cat.update');

//meals
Route::get('/meal/index',[MealController::class,'index'])->name('meal.index');

Route::get('/meal/create',[MealController::class,'create'])->name('meal.create');

Route::post('/meal/store',[MealController::class,'store'])->name('meal.store');

Route::get('/meal/edit/{id}',[MealController::class,'edit'])->name('meal.edit');

Route::post('/meal/update/{id}',[MealController::class,'update'])->name('meal.update');

Route::get('/meal/show/{id}',[MealController::class,'show_details'])->name('meal.details');
