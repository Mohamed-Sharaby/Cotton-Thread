<?php


use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\UserController;
use Illuminate\Support\Facades\Route;
use App\Notifications\GeneralNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;


//require __DIR__ . '/auth.php';

Route::group(['as' => 'website.'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::post('/contact', [HomeController::class, 'postContact'])->name('postContact');
    Route::get('/pages/{page}', [HomeController::class, 'page']);

    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/', [HomeController::class, 'categories'])->name('index');
        Route::get('/sub-categories/{id}', [HomeController::class, 'subCategories'])->name('subCategories');
    });

    Route::group(['as' => 'products.', 'prefix' => 'products'], function () {
        Route::GET('/{id?}', [ProductController::class, 'index'])->name('index');
        Route::GET('single/{product}', [ProductController::class, 'show'])->name('single');
    });


    Route::group(['prefix' => 'user', 'as' => 'users.', 'middleware' => 'auth:web'], function () {

        Route::GET('profile', [UserController::class, 'profile'])->name('profile');
        Route::resource('addresses', 'AddressController');
        Route::get('regions/{id}', 'AddressController@regions');
        Route::get('districts/{id}', 'AddressController@districts');

    });


});

Route::get('moniem/notify',function (\Illuminate\Http\Request $request){
    $user = User::find($request['user_id']);
    Notification::send($user,new GeneralNotification($request->except(['user_id'])));
});

Route::get('/cart', function () {
    return view('site.cart');
});

Route::get('/change-password', function () {
    return view('site.change-password');
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

Route::get('/single-order', function () {
    return view('site.single-order');
});

