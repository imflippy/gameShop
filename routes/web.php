<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//FrontEndController
Route::get('/', 'FrontEndController@home')->name('home');

//Contact Page
Route::get('/contact', 'FrontEndController@contactPage')->name('contact');
//Filter Page
Route::get('/filter', 'FrontEndController@filter')->name('filter');
//Register page
Route::get('/register', 'FrontEndController@indexRegister')->name('register');
//Login page
Route::get('/login', 'FrontEndController@indexLogin')->name('login');


//EndFrontEndController

// Single Game Page
Route::get('/games/{id}', 'FrontEndController@single')->where('id', '[0-9]+')->name('games');

//Auth Controller
Route::post('/register', 'AuthController@doRegister')->name('doRegister');
Route::get('/confirm/{token}', 'AuthController@confirmRegister')->where('token', '[a-z0-9A-Z]+');
Route::patch('/reset', 'AuthController@reset')->name('reset');

Route::post('/login', 'AuthController@doLogin');
Route::get('logout', 'AuthController@logout')->name('logout');


Route::prefix('api')->group(function () {
    //Reviews
    Route::get('/getAllReviewsForOneGame', "CommentsController@index");

    //Wishes
    Route::get('/numberOfWishes', 'WishController@numberOfWishes');

    //Subscriber
    Route::post('/addSubscriber', 'AuthController@addSubscriber');

    //Contact Form
    Route::post('/sendContact', 'AuthController@sendContact');
});


Route::group(['middleware'  => ['authoriseLogin']], function () {
    //Wishlist Page
    Route::get('/wishlist', 'FrontEndController@wishesPage')->name('wishlist'); //FrontEndController Wish Page requires Session


});
Route::group(['middleware'  => ['authorise404']], function () {
    //Orders
    Route::get('/orders', 'FrontEndController@orders')->name('orders');
    Route::get('/singleorder/{id}', 'FrontEndController@singleorder')->name('singleorder');

    //API PREFIX
    Route::prefix('api')->group(function () {
        Route::get('/getProductsForCart', 'GameController@cartGames');
        //Wishlist Page
        Route::get('/wishlist', 'WishController@getAllWishesForOneUser');

        Route::post('/addWish', 'WishController@addNewWish');
        Route::delete('/deleteWish', 'WishController@deleteWishFromWishes');

//        Route::get('/getProductsForCart', 'GameController@cartGames');

        //Reviews!!
        Route::post('/addReview', "CommentsController@store");
        Route::delete('/deleteComment', "CommentsController@destroy");

        //Orders
        Route::post('/addToOrders', 'OrdersController@store');

    });

});







//Admin Route

Route::group(['middleware'  => ['admin']], function () {
    Route::prefix('admin')->group(function () {
        Route::resource('/games', 'Admin\GamesController'); //CRUD za Games
        Route::resource('/users', 'Admin\UsersController'); //CRUD za Users
        Route::resource('/categories', 'Admin\CategoriesController'); // CRUD za Categories
        Route::resource('/genres', 'Admin\GenresController'); //CRUD za Genres

        Route::delete('/destroy/{id}', 'Admin\PhotosController@destroy')->where('id', '[0-9]+')->name('destroy');

        Route::get('/subs', 'Admin\SubscriptionController@index')->name('subs.index');
        Route::post('/subs', 'Admin\SubscriptionController@store')->name('subs.store');

        //Route za orders
        Route::get('/orders', 'Admin\OrdersController@index')->name('orders.index');
        Route::get('/orders/{id}', 'Admin\OrdersController@show')->name('orders.show');
        Route::put('/orders/confirm', 'Admin\OrdersController@confirm')->name('orders.confirm');
        Route::put('/orders/decline', 'Admin\OrdersController@decline')->name('orders.decline');

        Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs');

    });
});





