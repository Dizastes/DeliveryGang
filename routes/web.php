<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, "getData"]);


Route::get('login', function() {
	return view('login');
});

Route::post('login', [LoginController::class, "login"]);

Route::get('register', function() {
	return view('register');
});

Route::post('register', [RegisterController::class, "register"]);

Route::get('me', [LoginController::class, 'me']);

// Route::get('')