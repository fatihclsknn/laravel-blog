<?php

use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContactPageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
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
;
Route::prefix('admin')->group(function (){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    /*
     * Admin Article and Category Routes
     */
    Route::resource('/article',ArticlesController::class);
    Route::resource('/category',adminCategory::class);
    Route::get('/status',[ArticlesController::class,'status'])->name('admin.article.status');
    Route::get('/statuscategory',[adminCategory::class,'status'])->name('admin.category.status');
    /*
     * Admin login and register route
     */
    Route::match(['post','get'],'/login',[AuthController::class,'login'])->name('admin.login');
    Route::match(['post','get'],'/register',[AuthController::class,'register'])->name('admin.register');
    /*
     * Admin Page Control Roure
     */
    Route::resource('/aboutpage',AboutPageController::class);
    Route::get('/statusabout',[AboutPageController::class,'status'])->name('admin.about.status');
    Route::get('/statucontact',[ContactPageController::class,'status'])->name('admin.contact.status');
    Route::resource('/contact_pages',ContactPageController::class);
    /*
     * Admin user route
     */
    Route::get('/users',[UsersController::class,'index'])->name('admin.users.index');
    Route::get('/statususers',[UsersController::class,'status'])->name('admin.users.status');
    Route::delete('/user/delete/{id}',[UsersController::class,'delete'])->name('admin.users.delete');
});
