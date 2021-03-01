<?php

use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HomePageController;
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
/*
 * Front Routes
 */
Route::get('/',[HomePageController::class,'index'])->name('front.homePage');
Route::get('/about',[AboutController::class, 'index'])->name('front.about');
Route::get('/contact',[ContactController::class,'index'])->name('front.contact');
Route::get('/category/{slug}',[CategoryController::class,'index'])->name('front.category');
