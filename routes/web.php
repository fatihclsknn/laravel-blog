<?php

use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HomePageController;
use App\Http\Controllers\Front\SinglePostController;

use App\Http\Controllers\Admin\CategoryController as adminCategory;
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
Route::match(['post','get'],'/contact',[ContactController::class,'index'])->name('front.contact');
Route::get('/category/{slug}',[CategoryController::class,'index'])->name('front.category');
Route::get('blog/{slug}',[SinglePostController::class,'index'])->name('front.singlePost');
/*
 * Admin Routes
 */
Route::prefix('admin')->group(function (){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::resource('/article',ArticlesController::class);
    Route::resource('/category',adminCategory::class);

});
