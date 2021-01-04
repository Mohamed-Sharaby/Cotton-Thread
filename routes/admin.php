<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'dashboard', 'middleware' =>['auth:admin','admin'], 'as' => 'admin.'], function () {

    Route::get('/', 'DashboardController@index')->name('main');
    Route::resource('admins', 'AdminController');
    Route::resource('roles', 'RoleController');
    Route::resource('categories', 'CategoryController');
    Route::resource('sub-categories', 'SubCategoryController');
    Route::resource('products', 'ProductController');
    Route::resource('banners', 'BannerController');
    Route::resource('product-colors', 'ProductColorController');
    Route::resource('product-sizes', 'ProductSizeController');
    Route::resource('product-quantities', 'ProductQuantityController');
    Route::resource('product-images', 'ProductImageController');
    Route::resource('galleries', 'GalleryController');
    Route::resource('settings', 'SettingController');
    Route::get('/getSizes/{id}','ProductQuantityController@getSizes');
    Route::get('/getColors/{id}','ProductQuantityController@getColors');
    Route::post('active/{id}/role', 'RoleController@active')->name('active.role');
    Route::post('active/{id}/{type}', 'DashboardController@active')->name('active');


});


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
