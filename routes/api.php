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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([],function (){
    Route::post('register', [AuthController::class,'register']);
    Route::post('login', [AuthController::class,'login']);
    Route::put('verify', [AuthController::class,'verify']);
});

Route::group(['middleware'=>['jwt.check','x-lang']],function (){
   Route::get('/home',[HomeController::class,'index']);
   Route::get('/categories',[CategoriesController::class,'index']);
   Route::get('/subcategories/{category}',[CategoriesController::class,'subCategory']);
   Route::get('/products/',[ProductController::class,'index']);
   Route::get('/products/{subCategory}',[ProductController::class,'proBySubcategory']);
   Route::get('/product/{product}',[ProductController::class,'show']);
   Route::group(['middleware'=>'auth:api'],function (){
       Route::get('/favourites',[FavouritesController::class,'index']);  // required auth
       Route::post('/favourites/{product}',[FavouritesController::class,'favToggle']);  // required auth
       Route::apiResource('/address',AddressesController::class)->except('show');  // required auth
       Route::put('/edit-profile',[ProfileController::class,'profile']);  // required auth
       Route::put('/edit-pass',[ProfileController::class,'editPass']);  // required auth
       Route::post('/logout',[ProfileController::class,'logout']);  // required auth
   });
   Route::post('/contact',[HomeController::class,'contact']);
   Route::get('/gallery/{key}',[HomeController::class,'gallery']);
   Route::get('/setting/{key}',[HomeController::class,'setting']);
});