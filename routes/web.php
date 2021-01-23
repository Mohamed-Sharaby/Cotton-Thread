<?php


use App\Http\Controllers\Site\AuthController;
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


    Route::get('reset', [AuthController::class, 'resetForm'])->name('resetForm');
    Route::get('send-code', [AuthController::class, 'sendCode'])->name('sendCode');
    Route::post('/change-password', [AuthController::class, 'changePassword'])->name('changePassword');


    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/', [HomeController::class, 'categories'])->name('index');
        Route::get('/sub-categories/{id}', [HomeController::class, 'subCategories'])->name('subCategories');
    });

    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('/new', [ProductController::class, 'newProducts'])->name('new');
        Route::GET('/{id?}', [ProductController::class, 'index'])->name('index');
        Route::GET('single/{product}', [ProductController::class, 'show'])->name('single');
        Route::Post('rate', [ProductController::class, 'rate'])->name('rate');
    });

    Route::group(['prefix' => 'favourite', 'as' => 'favourites.', 'middleware' => 'auth'], function () {
        Route::get('add/{product_id}', 'FavouriteController@addToFavourite')->name('addToFavourite');
        Route::get('/', 'FavouriteController@index')->name('index');
        Route::get('delete/{id}/', 'FavouriteController@destroy')->name('destroy');
    });

    Route::group(['prefix' => 'user', 'as' => 'users.', 'middleware' => 'auth:web'], function () {
        Route::GET('profile', [UserController::class, 'profile'])->name('profile');
        Route::get('profile-edit', [UserController::class, 'editProfile'])->name('editProfile');
        Route::post('profile-edit', [UserController::class, 'updateProfile'])->name('updateProfile');
        Route::GET('wallet', [UserController::class, 'wallet'])->name('wallet');
        Route::resource('addresses', 'AddressController');
        Route::get('regions/{id}', 'AddressController@regions');
        Route::get('districts/{id}', 'AddressController@districts');
    });

    Route::group(['prefix' => 'orders', 'as' => 'orders.', 'middleware' => 'auth'], function () {
        Route::get('/', 'OrderController@index')->name('index');
        Route::get('{id}', 'OrderController@show')->name('show');
        Route::delete('delete/{id}', 'OrderController@delete')->name('delete');
        Route::post('cancel/{id}', 'OrderController@cancel')->name('cancel');
        Route::post('remove-item/{id}', 'OrderController@removeItem')->name('removeItem');
    });

    Route::group(['prefix' => 'cart', 'as' => 'carts.', 'middleware' => 'auth'], function () {
        Route::get('/', 'CartController@index')->name('index');
        Route::Post('add', 'CartController@AddItemToCart')->name('add');

    });


});

Route::get('moniem/notify', function (\Illuminate\Http\Request $request) {
    $user = User::find($request['user_id']);
    Notification::send($user, new GeneralNotification($request->except(['user_id'])));
    return response()->json('notification send');
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

Route::get('/news', function () {
    return view('site.news');
});
Route::get('/offers', function () {
    return view('site.offers');
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


Route::get('/profile-notifications', function () {
    return view('site.profile-notifications');
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

