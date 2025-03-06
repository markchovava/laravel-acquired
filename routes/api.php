<?php

use App\Http\Controllers\AppInfoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusinessCategoryController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function() {

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
        Route::post('/', [BusinessController::class, 'store']);
        Route::get('/{id}', [BusinessController::class, 'view']);
        Route::post('/{id}', [BusinessController::class, 'update']);
        Route::delete('/{id}', [BusinessController::class, 'delete']);
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
        Route::post('/', [BusinessCategoryController::class, 'store']);
        Route::get('/{id}', [BusinessCategoryController::class, 'view']);
        Route::delete('/{id}', [BusinessCategoryController::class, 'delete']);
    });
    Route::get('/business-category-by-business/{business_id}', [BusinessController::class, 'indexByBusiness']);
    Route::get('/business-category-by-category/{category_id}', [BusinessController::class, 'indexByCategory']);

    /* CATEGORY */
    Route::prefix('category')->group(function() {
        Route::get('/', [CategoryController::class, 'index']);
        Route::post('/', [CategoryController::class, 'store']);
        Route::get('/{id}', [CategoryController::class, 'view']);
        Route::post('/{id}', [CategoryController::class, 'update']);
        Route::delete('/{id}', [CategoryController::class, 'delete']);
    });
    Route::get('category-search/{search}', [CategoryController::class, 'search']);
    Route::get('category-all', [CategoryController::class, 'indexAll']);

    /* CITY */
    Route::prefix('city')->group(function() {
        Route::get('/', [CityController::class, 'index']);
        Route::post('/', [CityController::class, 'store']);
        Route::get('/{id}', [CityController::class, 'view']);
        Route::post('/{id}', [CityController::class, 'update']);
        Route::delete('/{id}', [CityController::class, 'delete']);
    });
    Route::get('city-search/{search}', [CityController::class, 'search']);
    Route::get('city-all', [CityController::class, 'indexAll']);
    Route::get('city-province/{province_id}', [CityController::class, 'indexByProvince']);

    /* FAQ */
    Route::prefix('faq')->group(function() {
        Route::get('/', [FaqController::class, 'index']);
        Route::post('/', [FaqController::class, 'store']);
        Route::get('/{id}', [FaqController::class, 'view']);
        Route::post('/{id}', [FaqController::class, 'update']);
        Route::delete('/{id}', [FaqController::class, 'delete']);
    });
    Route::get('faq-search/{search}', [FaqController::class, 'search']);
    Route::get('faq-all', [FaqController::class, 'indexAll']);

    /* MEMBERSHIP */
    Route::prefix('membership')->group(function() {
        Route::get('/', [MembershipController::class, 'index']);
        Route::post('/', [MembershipController::class, 'store']);
        Route::get('/{id}', [MembershipController::class, 'view']);
        Route::post('/{id}', [MembershipController::class, 'update']);
        Route::delete('/{id}', [MembershipController::class, 'delete']);
    });
    Route::get('membership-search/{search}', [MembershipController::class, 'search']);
    Route::get('membership-all', [MembershipController::class, 'indexAll']);

    /* PARTNER */
    Route::prefix('partner')->group(function() {
        Route::get('/', [PartnerController::class, 'index']);
        Route::post('/', [PartnerController::class, 'store']);
        Route::get('/{id}', [PartnerController::class, 'view']);
        Route::post('/{id}', [PartnerController::class, 'update']);
        Route::delete('/{id}', [PartnerController::class, 'delete']);
    });
    Route::get('partner-search/{search}', [PartnerController::class, 'search']);
    Route::get('partner-all', [PartnerController::class, 'indexAll']);

    /* PROVINCE */
    Route::prefix('province')->group(function() {
        Route::get('/', [ProvinceController::class, 'index']);
        Route::post('/', [ProvinceController::class, 'store']);
        Route::get('/{id}', [ProvinceController::class, 'view']);
        Route::post('/{id}', [ProvinceController::class, 'update']);
        Route::delete('/{id}', [ProvinceController::class, 'delete']);
    });
    Route::get('province-search/{search}', [ProvinceController::class, 'search']);
    Route::get('province-all', [ProvinceController::class, 'indexAll']);


    /* ROLE */
    Route::prefix('role')->group(function() {
        Route::get('/', [RoleController::class, 'index']);
        Route::post('/', [RoleController::class, 'store']);
        Route::get('/{id}', [RoleController::class, 'view']);
        Route::post('/{id}', [RoleController::class, 'update']);
        Route::delete('/{id}', [RoleController::class, 'delete']);
    });
    Route::get('/role-search/{search}', [RoleController::class, 'search']);
    Route::get('/role-all', [RoleController::class, 'indexAll']);
    
    
    /* USER */
    Route::prefix('user')->group(function() {
        Route::get('/', [UserController::class, 'index']);
        Route::post('/', [UserController::class, 'store']);
        Route::get('/{id}', [UserController::class, 'view']);
        Route::post('/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'delete']);
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
    
    
   

});
