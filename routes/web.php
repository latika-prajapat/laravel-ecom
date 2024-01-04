<?php


use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ColorsController;
use App\Http\Controllers\Admin\SizesController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () 
// {
//     return view('welcome');
// });


Route::get('/', [WelcomeController::class, 'index'])->name('index');
Route::get('/products', [ProductController::class, 'index'])->name('welcome.product.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('welcome.product.show');
Route::get('/products/reset', [ProductController::class, 'resetFilters'])->name('welcome.product.reset');
Route::get('/Addcart/{id}', [ProductController::class, 'Addcart'])->name('Addcart');
Route::get('/Showcart', [ProductController::class, 'Showcart'])->name('welcome.product.cart');
Route::get('/remove_cart/{id}',[ProductController::class, 'remove_cart'])->name('remove_cart');;
Route::get('/checkout',[ProductController::class, 'checkout'])->name('welcome.product.checkout');;
Route::get('/place_Order',[ProductController::class, 'place_Order'])->name('place_Order');;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('isAdmin')->name('home');

Route::middleware(['auth'])->prefix("admin")->group(function () {

    Route::get('/dashboard', function () {

        return view('admin.index');
    })->name('admin.dashboard');

    Route::resource('categories', CategoriesController::class);
    Route::resource('users', UsersController::class);
    Route::resource('products', ProductsController::class);
    Route::resource('banners', BannersController::class);
});