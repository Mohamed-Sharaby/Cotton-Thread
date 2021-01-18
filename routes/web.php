<?php


use App\Http\Controllers\Site\HomeController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'website.'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    //Route::get('/categories', [HomeController::class, 'categories'])->name('categories');

    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/', [HomeController::class, 'categories'])->name('index');
        Route::get('/sub-categories/{id}', [HomeController::class, 'subCategories'])->name('subCategories');
    });

    Route::group(['as' => 'products.', 'prefix' => 'products'], function () {
        Route::GET('/{id?}', 'ProductController@index')->name('index');
        Route::GET('single/{product}', 'ProductController@show')->name('single');
    });


});


Route::get('/about', function () {
    return view('site.about');
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
//Route::get('/all-products', function () {
//    return view('site.all-products');
//});
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
Route::get('/return-policy', function () {
    return view('site.return-policy');
});
Route::get('/privacy-policy', function () {
    return view('site.privacy-policy');
});
Route::get('/profile-add-address', function () {
    return view('site.profile-add-address');
});
Route::get('/profile-addresses', function () {
    return view('site.profile-addresses');
});
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
    return view('site.register');
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

Route::get('/return-policy', function () {
    return view('site.return-policy');
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
Route::get('/single-product', function () {
    return view('site.single-product');
});
Route::get('/usage-policy', function () {
    return view('site.usage-policy');
});
Route::get('/terms-conditions', function () {
    return view('site.terms-conditions');
});
