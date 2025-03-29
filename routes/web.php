<?php

use App\Http\Controllers\AppInfoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusinessCategoryController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\BusinessMessageController;
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



Route::get('/', function () {
    return view('welcome');
});


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

/* APPINFO */
Route::prefix('app-info')->group(function() {
    Route::get('/', [AppInfoController::class, 'view']);
});

/* BUSINESS */
Route::prefix('business')->group(function() {
    Route::get('/', [BusinessController::class, 'index']);
    Route::get('/{id}', [BusinessController::class, 'view']);
});
Route::get('/business-user', [BusinessController::class, 'indexByUser']);
Route::get('/business-status-active', [BusinessController::class, 'indexStatusActive']);
Route::get('/business-status/{status}', [BusinessController::class, 'indexByStatus']);
Route::get('/business-sort/{sort}', [BusinessController::class, 'sortBusiness']);
Route::get('/business-search-city-category', [BusinessController::class, 'searchCityCategory']);
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
Route::get('/business-message-index-by-status/{status}', [BusinessMessageController::class, 'indexByStatus']);
Route::get('/business-message-index-all-by-status/{status}', [BusinessMessageController::class, 'indexAllByStatus']);
Route::get('/business-category-by-business/{id}', [BusinessCategoryController::class, 'indexByBusiness']);
Route::get('/business-category-by-category/{id}', [BusinessCategoryController::class, 'indexByCategory']);

/* BUSINESS MESSAGE */
Route::prefix('business-message')->group(function() {
    Route::get('/', [BusinessMessageController::class, 'index']);
    Route::post('/', [BusinessMessageController::class, 'store']);
    Route::get('/{id}', [BusinessMessageController::class, 'view']);
});
Route::get('/business-message-search/{search}', [BusinessMessageController::class, 'search']);

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
/* PARTNER */
Route::prefix('partner')->group(function() {
    Route::get('/', [PartnerController::class, 'index']);
    Route::get('/{id}', [PartnerController::class, 'view']);
});
Route::get('partner-search/{search}', [PartnerController::class, 'search']);
Route::get('partner-all', [PartnerController::class, 'indexAll']);
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
    Route::post('/', [SubscriptionController::class, 'store']);
    Route::get('/{id}', [SubscriptionController::class, 'view']);
    Route::post('/{id}', [SubscriptionController::class, 'update']);
    Route::delete('/{id}', [SubscriptionController::class, 'delete']);
});
Route::get('/subscription-user', [SubscriptionController::class, 'indexByUser']);
Route::get('/subscription-search/{search}', [SubscriptionController::class, 'search']);