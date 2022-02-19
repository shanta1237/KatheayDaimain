<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\category\BrandController;
use App\Http\Controllers\category\CategoryController;
use App\Http\Controllers\category\CouponController;
use App\Http\Controllers\category\SubCategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MainAdminController;
use App\Http\Controllers\MainUserController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\SocialController;
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

Route::get('/', function () {
    return view('pages.index');
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::get('/register', [AdminController::class, 'registerForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('user.dashboard');
})->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [MainAdminController::class, 'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit', [MainAdminController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store', [MainAdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/password/edit', [MainAdminController::class, 'AdminPasswordEdit'])->name('admin.password.edit');
Route::post('/admin/password/update', [MainAdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');

//User All Route
Route::get('/user/logout', [MainUserController::class, 'Logout'])->name('user.logout');
Route::get('/dashboard', [MainUserController::class, 'UserProfile'])->name('user.profile');
Route::get('/user/dashboard/edit', [MainUserController::class, 'UserProfileEdit'])->name('profile.edit');
Route::post('/user/profile/store', [MainUserController::class, 'UserProfileStore'])->name('profile.store');
Route::get('/user/dashboard/password/edit', [MainUserController::class, 'UserPasswordEdit'])->name('user.password.edit');
Route::post('/user/password/update', [MainUserController::class, 'UserPasswordUpdate'])->name('password.update');

// All Category Route
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories');
Route::post('/admin/store/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/delete/category/{id}', [CategoryController::class, 'destroy']);
Route::get('/edit/category/{category}', [CategoryController::class, 'edit']);
Route::post('/update/category/{category}', [CategoryController::class, 'update'])->name('category.update');

// All Brand Route
Route::get('/admin/brand', [BrandController::class, 'index'])->name('brand');
Route::post('/admin/store/brand', [BrandController::class, 'store'])->name('brand.store');
Route::get('/edit/brand/{id}', [BrandController::class, 'edit']);
Route::get('/delete/brand/{id}', [BrandController::class, 'destroy']);
Route::post('/update/brand/{id}', [BrandController::class, 'update'])->name('brand.update');

// All SubCategory Route
Route::get('/admin/subcategory', [SubCategoryController::class, 'index'])->name('subcategory');
Route::post('/admin/store/subcategory', [SubCategoryController::class, 'store'])->name('subcategory.store');
Route::get('/edit/subcategory/{id}', [SubCategoryController::class, 'edit']);
Route::get('/delete/subcategory/{id}', [SubCategoryController::class, 'destroy']);
Route::post('/update/subcategory/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');

// All Coupon Route
Route::get('/admin/coupon', [CouponController::class, 'index'])->name('coupon');
Route::post('/admin/store/coupon', [CouponController::class, 'store'])->name('coupon.store');
Route::get('/edit/coupon/{id}', [CouponController::class, 'edit']);
Route::get('/delete/coupon/{id}', [CouponController::class, 'destroy']);
Route::post('/update/coupon/{id}', [CouponController::class, 'update'])->name('coupon.update');