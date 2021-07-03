<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\PictureController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductPropertyController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\PropertyGroupController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\client\CommentController;
use App\Http\Controllers\client\CommentController as AdminCommentController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\RegisterController;
use App\Http\Middleware\CheckPermission;
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






Route::prefix('')->name('client.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');


    Route::get('/products/{product}', [ClientProductController::class ,'show'])->name('products.show');

    Route::get('/register', [RegisterController::class ,'create'])->name('register');
    Route::post('/register/sendMail', [RegisterController::class ,'sendMail'])->name('register.sendMail');
    Route::get('/register/otp/{user}', [RegisterController::class ,'otp'])->name('register.otp');
    Route::post('/register/verifyOtp/{user}', [RegisterController::class ,'verifyOtp'])->name('register.verifyOtp');
    Route::delete('/logout', [RegisterController::class ,'logout'])->name('logout');

    Route::post('/products/{product}/comments/store',[CommentController::class , 'store'])->name('products.comments.store');






});




Route::prefix('/adminpanel')->group(function () {

    Route::get('/', function() {
        return view('Admin.home');
    });

    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('products', ProductController::class);
    Route::resource('products.pictures', PictureController::class);
    Route::resource('products.discounts', DiscountController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('propertyGroups', PropertyGroupController::class);
    Route::resource('properties', PropertyController::class);


 Route::get('/products/{product}/properties',[ProductPropertyController::class , 'index'])->name('product.properties.index');
 Route::post('/products/{product}/properties',[ProductPropertyController::class , 'store'])->name('product.properties.store');
    Route::get('/products/{product}/properties/create',[ProductPropertyController::class , 'create'])->name('product.properties.create');

    Route::get('/products/{product}/comments/index',[AdminCommentController::class , 'index'])->name('product.comments.index');
    Route::delete('/comments/destroy',[AdminCommentController::class , 'destroy'])->name('comments.destroy');





});
