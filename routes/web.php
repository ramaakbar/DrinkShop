<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
use App\Models\Category;
use App\Models\Drink;
use Illuminate\Support\Facades\Route;

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

// Home Page
Route::get('/', [HomeController::class,'index']);
Route::post('/drinks/{drink:id}', [HomeController::class,'store']);

// Category Page
Route::get('/category', function(){
    return view('category',[
        'drinks' => Drink::get(),
        'categories' => Category::get()
    ]);
});

// Cart Page
Route::get('/cart', [CartController::class,'index'])->middleware('auth');
Route::delete('/cart/{cart:id}', [CartController::class,'destroy']);
Route::delete('/cart', [CartController::class,'destroyAll']);
// Checkout
Route::get('/cart/checkout', [CartController::class,'checkout'])->middleware('auth');
Route::post('/cart/pay', [CartController::class,'buy']);


// Transaction
Route::get('/transactions',[TransactionController::class,'index'])->middleware('auth');
Route::get('/transactions/{transaction:id}',[TransactionController::class,'show'])->middleware('auth');
// Manage Drink Page
Route::resource('/drinks', DrinkController::class)->middleware('isadmin');

// Login and Register Page
Route::get('/login',[LoginController::class,'index'])->middleware('guest');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::post('/logout',[LoginController::class,'logout']);

Route::get('/sign-in/github',[LoginController::class,'github']);
Route::get('/sign-in/github/redirect',[LoginController::class,'githubRedirect']);

Route::get('/sign-in/google',[LoginController::class,'google']);
Route::get('/sign-in/google/redirect',[LoginController::class,'googleRedirect']);

Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store']);