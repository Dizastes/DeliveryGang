<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\lkController;
use App\Http\Controllers\cartController;

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

Route::get('/showInfo', [HomeController::class, "showFullInfo"]);

Route::middleware(['login'])->group(function () {

    Route::get('register', function () {
        return view('register');
    });
    Route::post('register', [RegisterController::class, "register"]);

    Route::get('login', function () {
        return view('login');
    })->name('login');
    Route::post('login', [LoginController::class, "login"]);
});

Route::middleware(['jwt'])->group(function () {

    Route::post('/addIngridient', [HomeController::class, "addIngridient"]);
    Route::post('/addNewIngridient', [HomeController::class, "addIngridientNewFood"]);
    Route::post('/deleteIngridient', [HomeController::class, "deleteIngridient"]);
    Route::post('/deleteNewIngridient', [HomeController::class, "deleteIngridientNewFood"]);

    Route::get('/NewFood', [HomeController::class, "getModalForAddNewFood"]);
    Route::post('/NewFood', [HomeController::class, "getModalForAddNewFood"]);

    Route::get('/deleteFood', [HomeController::class, "deleteFood"]);
    Route::post('/addNewFood', [HomeController::class, "AddNewFood"]);

    Route::get('/changeName', [HomeController::class, "changeName"]);
    Route::post('/changeName', [HomeController::class, "changeName"]);
    Route::get('/changeCost', [HomeController::class, "changeCost"]);
    Route::post('/changeCost', [HomeController::class, "changeCost"]);

    Route::get('/orders', [StatusController::class, "getOdersData"]);
    Route::post('/orders/change', [StatusController::class, "changeStatus"])->name('orders.change');
    Route::post('orders/next', [StatusController::class, "setNextStatus"])->name('orders.next');

    Route::get('/cart', [cartController::class, 'showCart'])->name('cart.show');
    Route::post('/cart/add', [cartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/addInto', [cartController::class, 'addIntoCart'])->name('cart.addInto');
    Route::post('/cart/clear', [cartController::class, 'clearCart'])->name('cart.clear');
    Route::post('/cart/remove', [cartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/addorder', [cartController::class, 'addOrder']);

    Route::get('/lk', [lkController::class, 'getInfo'])->name('lk');

    Route::get('/role', [HomeController::class, "returnRoleManager"]);
    Route::post('role/changeRole', [HomeController::class, "changeRole"]);
    Route::get('logout', [LoginController::class, "logout"]);
});
