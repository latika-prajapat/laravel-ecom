<?php

use App\Http\Controllers\CategoryController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    });
    
    Route::get('/categories',[CategoryController::class,'index']);
    Route::get('/add-category',[CategoryController::class,'addcategory']);
    Route::post('/store-category',[CategoryController::class,'storecategory']);
    Route::get('/edit-cate/{id}',[CategoryController::class,'editcategory']);
    Route::get('/update-category/{id}',[CategoryController::class,'updatecategory']);
    Route::get('/delete-cate/{id}',[CategoryController::class,'destroy']);
});