<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'dashboard', 'middleware' =>['auth:admin','admin'], 'as' => 'admin.'], function () {

    Route::get('/', 'DashboardController@index')->name('main');
    Route::resource('admins', 'AdminController');
    Route::resource('roles', 'RoleController');
    Route::resource('categories', 'CategoryController');


    Route::resource('products', 'ProductController');
    Route::resource('sliders', 'SliderController');
    Route::resource('services', 'ServiceController');
    Route::resource('branches', 'BranchController');
    Route::resource('guest-messages', 'GuestMessageController');
    Route::resource('settings', 'SettingController');

    Route::post('active/{id}/role', 'RoleController@active')->name('active.role');
    Route::post('active/{id}/{type}', 'DashboardController@active')->name('active');


});


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
