<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;


Route::get('dashboard', 'AuthController@showLoginForm')->name('admin.login');
Route::post('dashboard', 'AuthController@login');


Route::post('admin/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth:admin')
    ->name('admin.logout');

Route::group(['prefix' => 'dashboard', 'middleware' =>['auth:admin','admin'], 'as' => 'admin.'], function () {

    Route::get('/main', 'DashboardController@index')->name('main');
    Route::resource('admins', 'AdminController');
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('cities', 'CityController');
    Route::resource('regions', 'RegionController');
    Route::resource('districts', 'DistrictController');
    Route::resource('addresses', 'AddressesController');
    Route::resource('categories', 'CategoryController');
    Route::resource('sub-categories', 'SubCategoryController');
    Route::resource('products', 'ProductController');
    Route::resource('banners', 'BannerController');
    Route::resource('colors', 'ColorController');
    Route::resource('sizes', 'SizeController');
    Route::resource('coupons', 'CouponController');
    Route::resource('carts', 'CartController');
    Route::resource('product-quantities', 'ProductQuantityController');
    Route::resource('product-images', 'ProductImageController');
//    Route::resource('galleries', 'GalleryController');
    Route::resource('settings', 'SettingController');
    Route::resource('guest-messages', 'GuestMessageController');
    Route::get('/getSizes/{id}','ProductQuantityController@getSizes');
    Route::get('/getColors/{id}','ProductQuantityController@getColors');
    Route::post('active/{id}/role', 'RoleController@active')->name('active.role');
    Route::post('active/{id}/{type}', 'DashboardController@active')->name('active');
    Route::delete('delete/address/{address}', 'AddressesController@del_address')->name('del_address');

    Route::get('details/{product}', 'ProductController@details')->name('products.details');
    Route::get('quantities/{product}', 'ProductController@quantities')->name('products.quantities');
    Route::get('add_quantity/{id}', 'ProductController@addQuantity')->name('products.add_quantity');
    Route::Post('store_quantity/{id}', 'ProductController@storeQuantity')->name('products.store_quantity');
    Route::delete('destroy_quantity/{id}', 'ProductController@destroyQuantity')->name('products.destroy_quantity');
    Route::get('add_size/{id}', 'ProductController@addSize')->name('products.add_size');
    Route::Post('store_size/{id}', 'ProductController@storeSize')->name('products.store_size');
    Route::delete('delete/image/{image}', 'ProductImageController@del_image');
    Route::get('product_images/{id}/add', 'ProductImageController@add_image')->name('products.add_image');
    Route::post('product_images/{id}/add', 'ProductImageController@store_image')->name('products.store_image');

    Route::get('rates/{product}', 'ProductController@getRates')->name('products.rates');
    Route::delete('destroy_rate/{id}', 'ProductController@destroyRate')->name('products.destroy_rate');
});



require __DIR__.'/auth.php';
