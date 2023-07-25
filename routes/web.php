<?php

use App\Http\Controllers\Admin\CategoryCotroller;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Fronend\HomeController;
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

Route::get('/',[HomeController::class ,'index'])->name('index');
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function (){
  Route::get('/' ,[AdminController::class ,'index']);
  Route::prefix('category')->name('category.')->group(function (){
      Route::get('/' ,[CategoryCotroller::class ,'index'])->name('index');
      Route::get('add' ,[CategoryCotroller::class ,'addCategory'])->name('add');
      Route::post('store' ,[CategoryCotroller::class,'storeCateogry'])->name('store');
      Route::get('edit/{id}' ,[CategoryCotroller::class,'editCategory'])->name('edit');
      Route::post('update/{id}' ,[CategoryCotroller::class,'updateCategory'])->name('update');
      Route::get('delete/{id}' ,[CategoryCotroller::class,'deleteCategory'])->name('delete');
  });

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
