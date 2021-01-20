<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\FavouritesController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\AddressesController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PickersController;
use App\Http\Controllers\Api\CartsController;
use App\Http\Controllers\Api\NotificationsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware'=>'x-lang'],function (){
    Route::post('register', [AuthController::class,'register']);
    Route::post('login', [AuthController::class,'login']);
    Route::put('verify', [AuthController::class,'verify']);
    Route::post('forget1', [AuthController::class,'forget1']);
    Route::post('forget2', [AuthController::class,'forget2']);
    Route::post('forget3', [AuthController::class,'forget3']);
});

Route::group(['middleware'=>['jwt.check','x-lang']],function (){
   Route::get('/home',[HomeController::class,'index']);
   Route::get('/categories',[CategoriesController::class,'index']);
   Route::get('/subcategories/{category}',[CategoriesController::class,'subCategory']);
   Route::get('/products/',[ProductController::class,'index']);
   Route::get('/products/{subCategory}',[ProductController::class,'proBySubcategory']);
   Route::get('/product/{product}',[ProductController::class,'show']);
   Route::get('/product-details/{product}',[ProductController::class,'details']);
   Route::group(['middleware'=>['auth:api','x-lang']],function (){
       Route::post('/add-comment/{product}',[ProductController::class,'addComment']);  // required auth
       Route::get('/favourites',[FavouritesController::class,'index']);  // required auth
       Route::post('/favourites/{product}',[FavouritesController::class,'favToggle']);  // required auth
       Route::apiResource('/address',AddressesController::class)->except('show');  // required auth
       Route::put('/edit-profile',[ProfileController::class,'profile']);  // required auth
       Route::put('/edit-pass',[ProfileController::class,'editPass']);  // required auth
       Route::post('/add-to-cart/{product}',[CartsController::class,'addToCart']);  // required auth
       Route::put('/add-qty/{item}',[CartsController::class,'addQty']);  // required auth
       Route::put('/minus-qty/{item}',[CartsController::class,'minusQty']);  // required auth
       Route::get('/open-cart-details',[CartsController::class,'openCartDetails']);  // required auth
       Route::post('/local/cart',[CartsController::class,'localCart']);  // required auth
       Route::get('/check/coupon',[CartsController::class,'checkCoupon']);  // required auth
       Route::get('/all/carts',[CartsController::class,'allCarts']);  // required auth
       Route::put('/cart/{cart}',[CartsController::class,'changeCartStatus']);  // required auth
       Route::delete('/cart-item/{item}',[CartsController::class,'deleteItem']);  // required auth
       Route::post('/submit/cart/{cart}',[CartsController::class,'submitCart']);  // required auth
       Route::get('/wallet',[HomeController::class,'wallet']);  // required auth
       Route::get('/notifications',[NotificationsController::class,'index']);  // required auth
       Route::post('/logout',[ProfileController::class,'logout']);  // required auth
   });
   Route::group(['prefix'=>'pickers'],function (){
       Route::get('/categories',[PickersController::class,'categories']);
       Route::get('/subcategories',[PickersController::class,'subcategories']);
       Route::get('/cities',[PickersController::class,'cities']);
       Route::get('/regions',[PickersController::class,'regions']);
       Route::get('/districts',[PickersController::class,'districts']);
       Route::get('/colors',[PickersController::class,'colors']);
       Route::get('/sizes',[PickersController::class,'sizes']);
   });
   Route::post('/contact',[HomeController::class,'contact']);
   Route::get('/gallery/{key}',[HomeController::class,'gallery']);
   Route::get('/setting/{key}',[HomeController::class,'setting']);
   Route::get('/setting',[HomeController::class,'allSetting']);
});