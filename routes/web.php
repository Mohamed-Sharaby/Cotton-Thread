<?php


use App\Http\Controllers\Site\AddressController;
use App\Http\Controllers\Site\AuthController;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\FavouriteController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\OrderController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\UserController;
use Illuminate\Support\Facades\Route;
use App\Notifications\GeneralNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;


//require __DIR__ . '/auth.php';

Route::group(['middleware'=>'checkBanned','as' => 'website.'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::post('/contact', [HomeController::class, 'postContact'])->name('postContact');
    Route::get('/pages/{page}', [HomeController::class, 'page']);


    Route::get('reset', [AuthController::class, 'resetForm'])->name('resetForm');
    Route::get('send-code', [AuthController::class, 'sendCode'])->name('sendCode');
    Route::post('/change-password', [AuthController::class, 'changePassword'])->name('changePassword');

    Route::get('/offers', [HomeController::class, 'offers'])->name('offers');

    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/', [HomeController::class, 'categories'])->name('index');
        Route::get('/sub-categories/{id}', [HomeController::class, 'subCategories'])->name('subCategories');
    });

    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::GET('filter', [ProductController::class, 'filter'])->name('filter');
        Route::get('/new', [ProductController::class, 'newProducts'])->name('new');
        Route::GET('/{id?}', [ProductController::class, 'index'])->name('index');
        Route::GET('single/{product}', [ProductController::class, 'show'])->name('single');
        Route::GET('single/{product}/colors', [ProductController::class, 'getColors'])->name('getColors');
        Route::Post('rate', [ProductController::class, 'rate'])->name('rate');
    });

    Route::group(['prefix' => 'favourite', 'as' => 'favourites.', 'middleware' => 'auth'], function () {
        Route::get('add/{product_id}', [FavouriteController::class, 'addToFavourite'])->name('addToFavourite');
        Route::get('/', [FavouriteController::class, 'index'])->name('index');
        Route::get('delete/{id}/', [FavouriteController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'user', 'as' => 'users.', 'middleware' => 'auth:web'], function () {
        Route::GET('profile', [UserController::class, 'profile'])->name('profile');
        Route::get('profile-edit', [UserController::class, 'editProfile'])->name('editProfile');
        Route::post('profile-edit', [UserController::class, 'updateProfile'])->name('updateProfile');
        Route::GET('wallet', [UserController::class, 'wallet'])->name('wallet');
        Route::resource('addresses', 'AddressController');
        Route::get('regions/{id}', [AddressController::class, 'regions']);
        Route::get('districts/{id}', [AddressController::class, 'districts']);

        Route::GET('notifications', [UserController::class, 'notifications'])->name('notifications');
        Route::delete('notifications-destroy/{id?}', [UserController::class, 'destroyAllNotifications'])->name('destroyAllNotifications');

    });

    Route::group(['prefix' => 'orders', 'as' => 'orders.', 'middleware' => 'auth'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('{id}', [OrderController::class, 'show'])->name('show');
        Route::delete('delete/{id}', [OrderController::class, 'delete'])->name('delete');
        Route::post('cancel/{id}', [OrderController::class, 'cancel'])->name('cancel');
        Route::post('remove-item/{id}', [OrderController::class, 'removeItem'])->name('removeItem');
    });

    Route::group(['prefix' => 'cart', 'as' => 'carts.', 'middleware' => 'auth'], function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::Post('add', [CartController::class, 'AddItemToCart'])->name('add');
        Route::Post('update', [CartController::class, 'update'])->name('update');
        Route::post('remove/{id}', [CartController::class, 'removeFromCart'])->name('removeFromCart');
        Route::Post('coupon', [CartController::class, 'applyCoupon'])->name('applyCoupon');

        Route::get('pay-off', [CartController::class, 'payOff'])->name('payOff');
        Route::post('pay-off', [CartController::class, 'submitPayOff'])->name('submitPayOff');

    });


});

Route::get('moniem/notify', function (\Illuminate\Http\Request $request) {
    $user = User::find($request['user_id']);
    Notification::send($user, new GeneralNotification($request->except(['user_id'])));
    return response()->json('notification send');
});


Route::get('/multimedia', function () {
    return view('site.multimedia');
});

Route::get('/news', function () {
    return view('site.news');
});

Route::get('/booking-done', function () {
    return view('site.booking-done');
});

Route::get('/search-result', function () {
    return view('site.search-result');
});


