<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TransactionController;
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


// Auth
Route::get('/auth/google', [SocialController::class, 'getSocialRedirect'])->name('auth.google');
Route::get('/auth/callback', [SocialController::class, 'getSocialHandle']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products', [ProductController::class, 'getAllProducts']);
Route::get('/products/category/{category?}', [ProductController::class, 'getProductsByCategory']);


Route::middleware(['auth'])->group(function () {

  Route::middleware(['admin'])->group(function () {
    Route::prefix('/dashboard')->group(function () {

      Route::get('/', [DashboardController::class, 'getAdminDashboard'])->name('admin.dashboard');
      Route::get('/orders', [OrderController::class, 'getAdminOrder'])->name('admin.orders');
      Route::get('/transactions', [TransactionController::class, 'getAdminTransaction'])->name('admin.transactions');
      Route::post('/transactions/{id}/verify', [TransactionController::class, 'verifyPayment'])->name('admin.verify-payment');

      Route::prefix('/products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.products');
        Route::post('/', [ProductController::class, 'store'])->name('store.product');
        Route::put('/{id}', [ProductController::class, 'update'])->name('update.product');
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy.product');
      });

      Route::prefix('/categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories');
        Route::post('/', [CategoryController::class, 'store'])->name('store.category');
        Route::put('/{id}', [CategoryController::class, 'update'])->name('update.category');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('destroy.category');
      });
    });
  });

  Route::middleware(['user'])->group(function () {
    Route::prefix('/cart')->group(function () {
      Route::get('/', [CartController::class, 'index'])->name('show.cart');
      Route::post('/', [CartController::class, 'addToCart'])->name('addToCart');
      Route::put('/{id}', [CartController::class, 'update'])->name('update.cart');
      Route::delete('/{id}', [CartController::class, 'removeItem'])->name('removeItem.cart');
    });

    Route::get('/checkout', [CheckoutController::class, 'index']);
    Route::post('/checkout', [CheckoutController::class, 'showCheckout'])->name('show.checkout');
    Route::post('/checkout/process', [CheckoutController::class, 'processCheckout'])->name('process.checkout');
  });

  Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});