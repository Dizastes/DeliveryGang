<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\OrderController;
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

Route::get('/', [HomeController::class, "getData"])->name('home');

Route::get('/orders', [StatusController::class, "getOdersData"]);
Route::post('/orders/change', [StatusController::class, "changeStatus"])->name('orders.change');
Route::post('orders/next', [StatusController::class, "setNextStatus"])->name('orders.next');


Route::get('welcome', function() {
return view('welcome');
});

Route::get('login', function() {
return view('login');
});

Route::post('login', [LoginController::class, "login"]);

Route::get('register', function() {
return view('register');
});

Route::post('register', [RegisterController::class, "register"]);

Route::get('me', [LoginController::class, 'me']);

Route::post('/cart/add', [cartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/addInto', [cartController::class, 'addIntoCart'])->name('cart.addInto');
Route::get('/cart', [cartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/clear', [cartController::class, 'clearCart'])->name('cart.clear');
Route::post('/cart/remove', [cartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/removeInto', [cartController::class, 'removeIntoCart'])->name('cart.removeInto');

Route::get('logout', [LoginController::class, "logout"]);

Route::get('/send-notification', [OrderController::class, 'sendNotification']);

Route::get('/cart/addorder', [cartController::class, 'addOrder']);

// Route::get('')
