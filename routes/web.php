<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\VirtualController;


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


Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/buy', [CartController::class, 'buy'])->name('cart.buy');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
Route::post('/checkout/finish', [CheckoutController::class, 'finish'])->name('checkout.finish');

Route::get('/admin', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

Route::middleware(['admin.auth'])->group(function () {
    Route::get('/admin/tambah', [AdminController::class, 'index'])->name('admin.tambah');
});

//Auth
Route::get('/auth/login', function () {
    return view('auth/login');
})->name('auth/login');

Route::get('/auth/register', function () {
    return view('auth/register');
})->name('auth/register');

Route::get('/auth/forgot-password', function () {
    return view('auth/forgot-password');
})->name('auth/forgot-password');

/** Frontend Handler */
Route::get('/about', [AboutController::class, 'index']);
Route::get('/virtual-tour', [VirtualController::class, 'index']);
Route::get('/contact-us', [ContactController::class, 'index']);

/** Backend Handler */
Route::post('/api/auth/register', [AuthController::class, 'registerHandler']);
Route::post('/api/auth/login', [AuthController::class, 'loginHandler']);
Route::get('/api/auth/logout', [AuthController::class, 'logoutHandler']);
Route::post('/api/profile/update', [AuthController::class, 'updateProfile']);
Route::get('/api/profile/update-password', [AuthController::class, 'viewUpdatePassword']);
Route::post('/api/profile/update-password', [AuthController::class, 'updatePassword']);
Route::get('/api/provinces', [CheckoutController::class, 'getProvinces']);
Route::get('/api/cities/{id}', [CheckoutController::class, 'getCities']);

Route::get('/api/product/add', [ProductController::class, 'viewAdd']);
Route::post('/api/product/store', [ProductController::class, 'store']);
Route::get('/admin/api/product/edit/{id}', [ProductController::class, 'viewEdit']);
Route::post('/api/product/update', [ProductController::class, 'update']);
Route::get('/api/product/destroy/{id}', [ProductController::class, 'destroy']);
Route::get('/api/contact/mail', [ContactController::class, 'postContact']);
Route::post('/api/contact', [ContactController::class, 'contactHandler']);

Route::get('/', [DashboardController::class, 'index']);
Route::get('/admin/edit', [AdminController::class, 'edit']);
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
Route::get('/admin/tambah',[AdminController::class, 'tambah']);
Route::get('/product/{id}', [ProductController::class, 'productDetail']);
