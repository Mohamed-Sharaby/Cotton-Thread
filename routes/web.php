<?php


use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'website.'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/pages/{page}', [HomeController::class, 'page']);

    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/', [HomeController::class, 'categories'])->name('index');
        Route::get('/sub-categories/{id}', [HomeController::class, 'subCategories'])->name('subCategories');
    });

    Route::group(['as' => 'products.', 'prefix' => 'products'], function () {
        Route::GET('/{id?}', [ProductController::class, 'index'])->name('index');
        Route::GET('single/{product}', [ProductController::class, 'show'])->name('single');
    });


    Route::group(['prefix' => 'user', 'as' => 'users.', 'middleware' => 'auth'], function () {

        Route::GET('profile', [UserController::class,'profile'])->name('profile');
        Route::resource('addresses','AddressController');
        Route::get('regions/{id}','AddressController@regions');
        Route::get('districts/{id}','AddressController@districts');

    });


});


Route::get('/cart', function () {
    return view('site.cart');
});

Route::get('/change-password', function () {
    return view('site.change-password');
});
Route::get('/contact', function () {
    return view('site.contact');
});

Route::get('/multimedia', function () {
    return view('site.multimedia');
});
Route::get('/new-products', function () {
    return view('site.new-products');
});

Route::get('/news', function () {
    return view('site.news');
});
Route::get('/offers', function () {
    return view('site.offers');
});
Route::get('/favourite', function () {
    return view('site.favourite');
});
Route::get('/order-summary', function () {
    return view('site.order-summary');
});
Route::get('/payment', function () {
    return view('site.payment');
});
Route::get('/booking-done', function () {
    return view('site.booking-done');
});
//
//Route::get('/profile-add-address', function () {
//    return view('site.profile-add-address');
//});

Route::get('/profile-edit', function () {
    return view('site.profile-edit');
});
Route::get('/profile-notifications', function () {
    return view('site.profile-notifications');
});
Route::get('/profile-orders', function () {
    return view('site.profile-orders');
});
Route::get('/profile-wallet', function () {
    return view('site.profile-wallet');
});
Route::get('/profile', function () {
    return view('site.profile');
});
Route::get('/register', function () {
    return view('site.auth.register');
});

Route::get('/reset', function () {
    return view('site.forget');
});
Route::get('/check-code', function () {
    return view('site.check-code');
});
Route::get('/change-pass', function () {
    return view('site.change-password');
});

Route::get('/search-result', function () {
    return view('site.search-result');
});
Route::get('/sign-in', function () {
    return view('site.sign-in');
});
Route::get('/single-order', function () {
    return view('site.single-order');
});

