<?php

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

Route::get('/', function () {
    return view('site.home.main');
})->name('site.home');

Route::get('/sign-in', function () {
    return view('site.auth.sign-in');
});

Route::post('/sign-in', function (\Illuminate\Http\Request $request) {
//    dd($request->all());
    \Illuminate\Support\Facades\Validator::make($request->all(),[
        'phone' => 'required|numeric|exists:users,phone',
        'password' => 'required|min:6',
    ])->validate();
    if(auth()->guard('web')->attempt(['phone'=>$request->phone,'password'=>$request->password])){
        return redirect()->route('site.home');
    }
    return redirect()->back();
})->name('site.sign-in');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

//require __DIR__.'/auth.php';
