<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\ProductController;
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
   Route::get('/home',[HomeController::class,'index']);
   Route::get('/categories',[CategoriesController::class,'index']);
   Route::get('/subcategories/{category}',[CategoriesController::class,'subCategory']);
   Route::get('/products/',[ProductController::class,'index']);
   Route::get('/products/{subCategory}',[ProductController::class,'proBySubcategory']);
   Route::get('/product/{product}',[ProductController::class,'show']);
   Route::get('/setting/{key}',[HomeController::class,'setting']);
});