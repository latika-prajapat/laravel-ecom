<?php


use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () 
// {
//     return view('welcome');
// });


Route::get('/',[WelcomeController::class,'index']);
  
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('isAdmin')->name('home');

Route::middleware(['auth'])->prefix("admin")->group(function () 
{
    
    Route::get('/dashboard', function () 
    {
       
        return view('admin.index');
    })->name('admin.dashboard');

    Route::resource('categories', CategoriesController::class);
    Route::resource('users', UsersController::class);
    Route::resource('products', ProductsController::class);
    Route::resource('banners', BannersController::class);
});