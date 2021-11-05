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
                        Route::put('/{order}', [OrderController::class, 'update'])
                            ->name('update');
                    }
                );
            Route::get('/clients', [UserController::class, 'index'])
                ->name('client.index');
            Route::resource('categories', 'Admin\CategoryController');
            Route::resource('products', 'Admin\ProductController');
        }
    );
