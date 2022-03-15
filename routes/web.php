<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
 

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
})->name('template.home');

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


Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');


Route::prefix('admin')->controller(AdminController::class)->group(function(){
    Route::get('/', 'checkAuth');
    Route::get('/login', 'login')->name('admin.login');
    Route::post('custom-login','customLogin')->name('login.custom');
    Route::get('/register', 'register')->name('admin.register');
    Route::post('custom-registration', 'customRegistration')->name('register.custom');
    Route::get('/dashboard', 'index')->name('admin.dashboard');
    Route::get('/category', 'category')->name('admin.category');
    Route::get('/message', 'message');
    Route::post('/categories', 'store'); 
    Route::get('/edit-category/{id}', 'edit');
    Route::get('/edit-product/{id}', 'editProduct');
    Route::put('/update-category/{id}','update');
    Route::get('/fetch-categories','fetchCategory');
    route::delete('/delete-category/{id}', 'destroy');
    Route::get('/product', 'product')->name('admin.product');  
    Route::post('/products', 'storeProduct')->name('admin.store');  
    Route::get('/fetch-products', 'fetchProduct');
    Route::post('/updateProduct', 'updateProduct')->name('update.product');
    route::delete('/delete-product/{id}', 'destroyProduct');
    route::get('/profile', 'profile')->name('admin.profile');
    route::put('/profile', 'modifyProfile')->name('admin.modifyprofile');
    Route::put('/changepass', 'changePass')->name('admin.changepass');

});

