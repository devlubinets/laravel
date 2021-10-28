<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;

Auth::routes();

Route::get('', 'HomeController@index')->name('home');
Route::get('', 'User\ProductController@randoms')->name('randoms');

//Route::prefix('products')->group(function (){
//    Route::get('category/{category_id?}', 'User\ProductController@index')->name('products.index');
//    Route::get('/{code?}', 'User\ProductController@show')->name('product.show');
//});

Route::prefix('products')
    ->name('products.')
    ->group(
        function () {
            Route::get('category/{category_id?}', [ProductController::class, 'index'])
                ->name('index');
            Route::get('/{id}/{slug?}', [ProductController::class, 'show'])
                ->name('show');
        }
    );

Route::get('/search', [PostsController::class, 'search'])
    ->name('search');
//Route::prefix('basket')->group(function (){
//        Route::get('','BasketController@basket')->name('user.basket.show');
//        Route::get('/place','BasketController@basketPlace')->name('user.basket-place')->middleware(['auth']);
//        Route::post('/place','BasketController@basketConfirm')->name('user.basket-confirm');
//        Route::post('/add/{id}','BasketController@basketAdd')->name('user.basket-add');
//        Route::post('/remove/{id}','BasketController@basketRemove')->name('user.basket-remove');
//});

Route::prefix('basket')
    ->name('basket.')
    ->group(
        function () {
            Route::get('', [BasketController::class, 'basket'])
                ->name('show');
            Route::get('/place', [BasketController::class, 'basketPlace'])
                ->name('place');
            Route::post('/place', [BasketController::class, 'basketConfirm'])
                ->name('confirm');
            Route::post('/add/{id}', [BasketController::class, 'basketAdd'])
                ->name('add');
            Route::post('/remove/{id}', [BasketController::class, 'basketRemove'])
                ->name('remove');

        }
    );

//Route::prefix('admin')->name('admin.')->group(function () {
//    Route::get('login', 'Auth\AdminLoginController@login')->name('auth.login');
//    Route::post('login', 'Auth\AdminLoginController@loginAdmin')->name('auth.loginAdmin');
//    Route::post('logout', 'Auth\AdminLoginController@logout')->name('auth.logout');
//    Route::group([
//        'middleware' => ['auth:admin'],
//        'namespace' => 'Admin',
//        ],
//        function () {
//
//            Route::get('/', 'OrderController@index')->name('home');
//            Route::get('/orders/{id}/show','OrderController@show')->name('orders.show');
//            Route::get('/orders', 'OrderController@index')->name('orders');
//            Route::delete('/orders/{order}', 'OrderController@destroy')->name('orders.destroy');
//            Route::get('/clients', 'UserController@index')->name('client.index');
//            Route::resource('categories', 'CategoryController');
//            Route::resource('products', 'ProductController');
//    });
//});

Route::prefix('admin')
    ->name('admin.')
    ->group(
        function () {
            Route::prefix('auth')
                ->name('auth.')
                ->group(
                    function () {
                        Route::get('login', [AdminLoginController::class, 'login'])
                            ->name('login');
                        Route::post('login', [AdminLoginController::class, 'loginAdmin'])
                            ->name('loginAdmin');
                        Route::post('logout', [AdminLoginController::class, 'logout'])
                            ->name('logout');
                    }
                );
            Route::prefix('orders')
                ->name('orders.')
                ->group(
                    function () {
                        Route::get('', [OrderController::class, 'index'])
                            ->name('index');
                        Route::get('/{id}', [OrderController::class, 'show'])
                            ->name('show');
                        Route::delete('/{order}', [OrderController::class, 'destroy'])
                            ->name('destroy');
                    }
                );
            Route::get('/clients', [UserController::class, 'index'])
                ->name('client.index');
            Route::resource('categories', 'Admin\CategoryController');
            Route::resource('products', 'Admin\ProductController');
        }
      );
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

