<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'site/','middleware'=>['jwt-check','x-lang']],function (){
   Route::get('test',function (){
       dd(auth('api')->user(),auth('web')->user(),auth('admin')->user(),auth()->user());
       return'csdhbnjmk';
   });
});