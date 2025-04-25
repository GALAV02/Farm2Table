<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PagesController::class, 'index'])->name('home');

Route::get('/about',[PagesController::class, 'about'])->name('about');

Route::get('/shop',[PagesController::class, 'shop'])->name('shop');

Route::get('/register',[PagesController::class, 'register'])->name('register');

Route::get('/login',[PagesController::class, 'login'])->name('login');

Route::get('/viewproduct/{id}',[PagesController::class, 'viewproduct'])->name('viewproduct');

Route::get('/search',[PagesController::class,'search'])->name('search');

Route::middleware(['auth'])->group(function () {
    Route::post('/addtocart', [CartController::class, 'store'])->name('addtocart');
    Route::get('/mycart',[CartController::class,'mycart'])->name('mycart');
    Route::post('/cartdestroy',[CartController::class,'destroy'])->name('cart.destroy');
    Route::get('/checkout/{cartid}',[PagesController::class,'checkout'])->name('checkout');
    Route::get('/order/store/{cartid}',[OrderController::class,'store'])->name('order.store');
    Route::get('/contact',[PagesController::class, 'contact'])->name('contact');
    Route::post('/contact-submit', [ContactController::class, 'store'])->name('contact.submit');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'isadmin'])->name('dashboard');

Route::middleware(['auth', 'isadmin'])->group(function () {

    //category routes
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::post('/category/update', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/category/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');

    //brand routes
    Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
    Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');
    Route::post('/brand/update', [BrandController::class, 'update'])->name('brand.update');
    Route::post('/brand/destroy', [BrandController::class, 'destroy'])->name('brand.destroy');

    //product routes
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::post('/product/destroy', [ProductController::class, 'destroy'])->name('product.destroy');

    //oder routes
    Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
    Route::get('/orders/status/{orderid}/{status}', [OrderController::class, 'status'])->name('order.status');

    //user routes
    Route::get('/users', [UserController::class, 'index'])->name('user.index');

    //profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
