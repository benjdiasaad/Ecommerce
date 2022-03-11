<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('template.home');
});

Route::get('/about', function () {
    return view('template.about');
});

// Products Route 
Route::controller(ProductController::class)->group(function(){
    Route::get('menu', 'index')->name('template.menu');
    Route::get('/menu/{nom}', 'show')->name('template.show');
});

// Cart route
Route::controller(CartController::class)->group(function(){
   Route::post('/panier/ajouter', 'store')->name('cart.store');
   Route::get('panier', 'index')->name('cart.index');
   Route::delete('/panier/{rowId}', 'destroy')->name('cart.destroy');
});

Route::get('/special', function () {
    return view('template.specials');
});

Route::get('/contact', function () {
    return view('template.contact');
});



Route::prefix('admin')->controller(AdminController::class)->group(function(){
    Route::get('/login', 'login')->name('admin.login');
    Route::get('/register', 'register')->name('admin.register');
    Route::get('/dashboard', 'index')->name('admin.dashboard');
    Route::get('/category', 'category')->name('admin.category');    
    Route::get('/product', 'product')->name('admin.product');    
});