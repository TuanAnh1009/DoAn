<?php

use App\Http\Controllers\Front;
use App\Http\Controllers\Admin;
use App\Http\Controllers;
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

//Front
Route::get('/', [Front\HomeController::class, 'index']);

Route::prefix('products')->group(function() {
    Route::get('', [Front\ProductController::class, 'index']);
    Route::get('{id}', [Front\ProductController::class, 'show']);
});

Route::controller(Front\LoginController::class)->group(function () {
    Route::post('/', 'login');
    Route::post('/collections', 'login');
    Route::post('/collections/{id}', 'login');
    Route::post('/pages/our-mission', 'login');
    Route::post('/account/register', 'login');
    Route::post('/account/login', 'login');
    Route::post('/products/{id}', 'login');
    Route::post('/products', 'login');
    Route::post('/cart', 'login');
    Route::post('/checkout', 'login');
});

Route::prefix('account')->group(function() {
    Route::get('login',[Front\AccountController::class,'loginPage']);
    Route::post('login',[Front\AccountController::class,'postLogin']);
    Route::get('logout',[Front\AccountController::class,'logout']);
    Route::get('register',[Front\AccountController::class,'register'])->name('register');
    Route::post('register',[Front\AccountController::class,'postRegister']);

    Route::get('forgot-password',[Front\AccountController::class,'forgotPass']);
    Route::post('forgot-password',[Front\AccountController::class,'postForgotPass']);
    Route::get('update-password',[Front\AccountController::class,'resetPass']);
    Route::post('update-password',[Front\AccountController::class,'postResetPass']);

});
Route::prefix('my-account')->group(function() {
    Route::get('', [Front\AccountController::class, 'myAccount'])->middleware('CheckMemberLogin');
    Route::post('', [Front\AccountController::class, 'editAccount']);
});
Route::prefix('collections')->group(function() {
    Route::get('', [Front\CollectionController::class, 'index']);
    Route::get('{id}', [Front\CollectionController::class, 'show']);
});

Route::get('/pages/our-mission', function () {
    return view('front/layout/pages/our-mission');
});

Route::prefix('cart')->group(function() {
    Route::get('', [Front\CartController::class, 'index']);
    Route::get('add/{id}', [Front\CartController::class, 'add']);
    Route::get('remove/{rowId}', [Front\CartController::class, 'delete']);
    Route::get('update/{rowId}', [Front\CartController::class, 'update']);
});

Route::prefix('checkout')->group(function() {
    Route::get('', [Front\CheckOutController::class, 'index']);
    Route::post('post', [Front\CheckOutController::class, 'addOder']);
    Route::get('result', [Front\CheckOutController::class, 'result']);
});

//Admin
Route::prefix('admin')->middleware('CheckAdminLogin')->group(function () {
    Route::redirect('', 'admin/dashboard');

    Route::resource('customer', Admin\UserCustomerController::class);
    Route::resource('collections', Admin\CollectionsController::class);
    Route::resource('brand', Admin\BrandController::class);
    Route::resource('product', Admin\ProductController::class);
    Route::resource('product/{product_id}/image', Admin\ProductImageController::class);
    Route::resource('product/{product_id}/detail', Admin\ProductDetailController::class);
    Route::resource('order', Admin\OrderController::class);

    Route::prefix('my-account')->group(function() {
        Route::get('', [Admin\UserAdminController::class, 'myAccount']);
        Route::post('', [Admin\UserAdminController::class, 'editAccount']);
    });

    Route::get('dashboard', [Admin\UserCustomerController::class, 'dashboardAdmin']);

    Route::prefix('login')->group(function () {
        Route::get('', [Admin\HomeController::class, 'getLogin'])->withoutMiddleware('CheckAdminLogin');
        Route::post('', [Admin\HomeController::class, 'postLogin'])->withoutMiddleware('CheckAdminLogin');
    });

    Route::get('logout', [Admin\HomeController::class, 'logout']);
});

//Super Admin
Route::prefix('sadmin')->middleware('CheckSuperAdminLogin')->group(function () {
    Route::resource('admin', Admin\UserAdminController::class);

    Route::prefix('login')->group(function () {
        Route::get('', [Admin\HomeController::class, 'getLoginSAdmin'])->withoutMiddleware('CheckSuperAdminLogin');
        Route::post('', [Admin\HomeController::class, 'postLoginSAdmin'])->withoutMiddleware('CheckSuperAdminLogin');
    });

    Route::get('dashboard', [Admin\UserAdminController::class, 'dashboardSAdmin']);

    Route::get('logout', [Admin\HomeController::class, 'logoutSAdmin']);
});
