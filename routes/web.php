<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController as AdminFrontend;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\frontend\ImpressionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\ProductController as FrontendProduct;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckOutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;
use Illuminate\Routing\RouteGroup;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


Route::get('/', [FrontendProduct::class, 'index']);
Route::get('category', [FrontendProduct::class, 'category']);
Route::get('view-category/{id}', [FrontendProduct::class, 'viewCategory']);
Route::get('view-category/{id}/{productId}', [FrontendProduct::class, 'productView']);

Auth::routes();

Route::post('add-to-cart', [CartController::class, 'addProduct']) -> name('addToCart');
Route::post('delete-cart-item', [CartController::class, 'deleteProduct']);
Route::post('update-cart', [CartController::class, 'updateCart']);
Route::post('discount-five', [CartController::class, 'discountPrice']);

Route::get('load-cart-data', [CartController::class,'cartcount']);
Route::get('load-wishlist-count', [WishlistController::class,'wishlistCount']);

Route::post('add-to-wishlist', [WishlistController::class, 'addProduct']) -> name('addToWishlist');
Route::post('delete-wishlist-item', [WishlistController::class, 'removeProduct']);

Route::get('sort-by-price-desc', [FrontendProduct::class, 'sortByPriceDesc']);
Route::get('sort-by-price-asc', [FrontendProduct::class, 'sortByPriceAsc']);
Route::get('aboutus', [FrontendProduct::class, 'showAboutus']);
Route::get('contact', [FrontendProduct::class, 'showContact']);

Route::get('impressions', [ImpressionController::class, 'impressionsPage']);
Route::post('add-impression', [ImpressionController::class, 'addImpresion']);

Route::middleware(['auth'])->group(function () {  
    Route::get('cart', [CartController::class, 'viewCart']);
    Route::get('checkout', [CheckOutController::class, 'index']);
    Route::post('place-order', [CheckOutController::class, 'placeOrder']);
    
    Route::get('view-order/{id}', [UserController::class, 'orderDetails']);

    Route::get('wishlist', [WishlistController::class, 'index']);

    Route::get('edit-user', [UserController::class, 'editUser']);
    Route::put('update-user/{id}', [UserController::class, 'updateUser']);
    Route::get('edit-password/{id}', [UserController::class, 'editPassword']);
    Route::put('update-password/{id}', [UserController::class, 'updatePassword']);
    Route::get('my-orders', [UserController::class, 'index']); 
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [AdminFrontend::class, 'index']);  

    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('add-category', [CategoryController::class, 'add']);
    Route::post('insert-categories', [CategoryController::class, 'insert']);
    Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'delete']);

    Route::get('products', [ProductController::class, 'index']);
    Route::get('add-products', [ProductController::class, 'add']);  
    Route::post('insert-products', [ProductController::class, 'insert']); 
    Route::get('edit-product/{id}', [ProductController::class, 'edit']); 
    Route::put('update-products/{id}', [ProductController::class, 'update']); 
    Route::get('delete-product/{id}', [ProductController::class, 'delete']); 

    Route::get('orders', [OrderController::class, 'index']);
    Route::get('admin/view-order/{id}', [OrderController::class, 'orderDetails']);
    Route::put('update-order/{id}', [OrderController::class, 'updateStatus']);
    Route::get('completed-orders', [OrderController::class, 'completedOrders']);

    Route::get('users', [DashboardController::class, 'users']);
    Route::get('view-user/{id}', [DashboardController::class, 'userDetails']);
    Route::get('delete-user/{id}', [DashboardController::class, 'deleteUser']);
    Route::get('create-manager', [DashboardController::class, 'createManager']);
    Route::put('insert-manager', [DashboardController::class, 'insertManager']);
});

