<?php

use App\Http\Controllers\AppInfoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusinessCategoryController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

/* PROFILE */
Route::prefix('profile')->group(function() {
    Route::get('/', [AuthController::class, 'view']);
    Route::post('/', [AuthController::class, 'store']);
});
Route::post('/password', [AuthController::class, 'password']);
Route::post('/email', [AuthController::class, 'email']);
Route::get('/logout', [AuthController::class, 'logout']);

/* APPINFO */
Route::prefix('app-info')->group(function() {
    Route::get('/', [AppInfoController::class, 'view']);
    Route::post('/', [AppInfoController::class, 'store']);
});

/* BUSINESS */
Route::prefix('business')->group(function() {
    Route::get('/', [BusinessController::class, 'index']);
    Route::get('/{id}', [BusinessController::class, 'view']);
});
Route::get('/business-user/{user_id}', [BusinessController::class, 'indexByUser']);
Route::get('/business-city/{city_id}', [BusinessController::class, 'indexByCity']);
Route::get('/business-province/{province_id}', [BusinessController::class, 'indexByProvince']);
Route::get('/business-search/{search}', [BusinessController::class, 'search']);
Route::get('/business-user-search/{user_id}/{search}', [BusinessController::class, 'searchByUser']);
Route::get('/business-city-search/{city_id}/{search}', [BusinessController::class, 'searchByCity']);
Route::get('/business-province-search/{province_id}/{search}', [BusinessController::class, 'searchByProvince']);

/* BUSINESS CATEGORY */
Route::prefix('business-category')->group(function() {
    Route::get('/', [BusinessCategoryController::class, 'index']);
    Route::get('/{id}', [BusinessCategoryController::class, 'view']);
});
Route::get('/business-category-by-business/{business_id}', [BusinessController::class, 'indexByBusiness']);
Route::get('/business-category-by-category/{category_id}', [BusinessController::class, 'indexByCategory']);

/* CATEGORY */
Route::prefix('category')->group(function() {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{id}', [CategoryController::class, 'view']);
});
Route::get('category-search/{search}', [CategoryController::class, 'search']);
Route::get('category-all', [CategoryController::class, 'indexAll']);

/* CITY */
Route::prefix('city')->group(function() {
    Route::get('/', [CityController::class, 'index']);
    Route::get('/{id}', [CityController::class, 'view']);
});
Route::get('city-search/{search}', [CityController::class, 'search']);
Route::get('city-all', [CityController::class, 'indexAll']);
Route::get('city-province/{province_id}', [CityController::class, 'indexByProvince']);

/* FAQ */
Route::prefix('faq')->group(function() {
    Route::get('/', [FaqController::class, 'index']);
    Route::get('/{id}', [FaqController::class, 'view']);
});
Route::get('faq-search/{search}', [FaqController::class, 'search']);
Route::get('faq-all', [FaqController::class, 'indexAll']);

/* MEMBERSHIP */
Route::prefix('membership')->group(function() {
    Route::get('/', [MembershipController::class, 'index']);
    Route::get('/{id}', [MembershipController::class, 'view']);
});
Route::get('membership-search/{search}', [MembershipController::class, 'search']);
Route::get('membership-all', [MembershipController::class, 'indexAll']);

/* PARTNER */
Route::prefix('partner')->group(function() {
    Route::get('/', [PartnerController::class, 'index']);
    Route::get('/{id}', [PartnerController::class, 'view']);
});
Route::get('membership-search/{search}', [PartnerController::class, 'search']);
Route::get('membership-all', [PartnerController::class, 'indexAll']);

/* PROVINCE */
Route::prefix('province')->group(function() {
    Route::get('/', [ProvinceController::class, 'index']);
    Route::get('/{id}', [ProvinceController::class, 'view']);
});
Route::get('province-search/{search}', [ProvinceController::class, 'search']);
Route::get('province-all', [ProvinceController::class, 'indexAll']);


/* ROLE */
Route::prefix('role')->group(function() {
    Route::get('/', [RoleController::class, 'index']);
    Route::get('/{id}', [RoleController::class, 'view']);
});
Route::get('/role-search/{search}', [RoleController::class, 'search']);
Route::get('/role-all', [RoleController::class, 'indexAll']);


/* USER */
Route::prefix('user')->group(function() {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'view']);
});
Route::get('/user-search/{search}', [UserController::class, 'search']);


/* SUBSCRIPTION */
Route::prefix('subscription')->group(function() {
    Route::get('/', [SubscriptionController::class, 'index']);
    Route::get('/{id}', [SubscriptionController::class, 'view']);
});
Route::get('/subscription-user', [SubscriptionController::class, 'indexByUser']);
Route::get('/subscription-search/{search}', [SubscriptionController::class, 'search']);







