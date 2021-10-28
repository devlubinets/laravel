<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;

Auth::routes();

Route::get('', 'HomeController@index')->name('home');
Route::get('', 'User\ProductController@randoms')->name('randoms');

Route::prefix('products')->group(function (){
    Route::get('category/{category_id?}', 'User\ProductController@index')->name('products.index');
    Route::get('/{code?}', 'User\ProductController@show')->name('product.show');
});

Route::get('/search/', 'PostsController@search')->name('search');

Route::prefix('basket')->group(function (){
    Route::get('','BasketController@basket')->name('user.basket.show');
    Route::get('/place','BasketController@basketPlace')->name('user.basket-place')->middleware(['auth']);
    Route::post('/place','BasketController@basketConfirm')->name('user.basket-confirm');
    Route::post('/add/{id}','BasketController@basketAdd')->name('user.basket-add');
    Route::post('/remove/{id}','BasketController@basketRemove')->name('user.basket-remove');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', 'Auth\AdminLoginController@login')->name('auth.login');
    Route::post('login', 'Auth\AdminLoginController@loginAdmin')->name('auth.loginAdmin');
    Route::post('logout', 'Auth\AdminLoginController@logout')->name('auth.logout');
    Route::group([
        'middleware' => ['auth:admin'],
        'namespace' => 'Admin',
        ],
        function () {
            /*Route::get('/', function () {
                return view('admin.dashboard');
            })->name('dashboard');*/
            Route::get('/', 'OrderController@index')->name('home');
            Route::get('/orders', 'OrderController@index')->name('orders');
            Route::delete('/orders/{order}', 'OrderController@destroy')->name('orders.destroy');
            Route::get('/clients', 'UserController@index')->name('client.index');
            Route::resource('categories', 'CategoryController');
            Route::resource('products', 'ProductController');
    });

//    Route::prefix('products')->group(function (){
//        Route::get('/{id?}', 'Admin\ProductController@index')->name('products.index');
//        Route::get('/create', 'Admin\ProductController@create')->name('products.create');
//        Route::post('/', 'Admin\ProductController@store')->name('products.store');
//    });
});
//Route::get('/products', 'Product\ProductController@index')->name('products.index');
//Route::get('/products/create', 'Product\ProductController@create')->name('products.create');

//Route::prefix('products')
//        ->name('products.')
//        ->group(
//            function () {
//                Route::get('', [ProductController::class, 'index'])
//                    ->name('index');
//                Route::get('/create', [ProductController::class, 'create'])
//                    ->name('create');
//            }
//        );


