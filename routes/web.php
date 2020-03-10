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

Route::get('/', 'HomeController@index')->name('home');

// Single Game Page
Route::get('/games/{id}', 'GameController@single')->where('id', '[0-9]+')->name('games');

//Filter Page
Route::get('/filter', 'GameController@filter')->name('filter');

//Contact Page
Route::get('/contact', 'AuthController@contactPage')->name('contact');

//Auth Controller
Route::get('/register', 'AuthController@indexRegister')->name('register');
Route::post('/register', 'AuthController@doRegister')->name('doRegister');
Route::get('/confirm/{token}', 'AuthController@confirmRegister')->where('token', '[a-z0-9A-Z]+');
Route::patch('/reset', 'AuthController@reset')->name('reset');

Route::get('/login', 'AuthController@indexLogin')->name('login');
Route::post('/login', 'AuthController@doLogin');
Route::get('logout', 'AuthController@logout');


Route::prefix('api')->group(function () {
    //Reviews
    Route::get('/getAllReviewsForOneGame', "CommentsController@index");

    //Wishes
    Route::get('/numberOfWishes', 'WishController@numberOfWishes');
});


Route::group(['middleware'  => ['authoriseLogin']], function () {
    //Wishlist Page
    Route::get('/wishlist', 'WishController@wishesPage')->name('wishlist');

});
Route::group(['middleware'  => ['authorise404']], function () {
    //API PREFIX
    Route::prefix('api')->group(function () {
        //Wishlist Page
        Route::get('/wishlist', 'WishController@getAllWishesForOneUser');

        Route::post('/addWish', 'WishController@addNewWish');
        Route::delete('/deleteWish', 'WishController@deleteWishFromWishes');

//        Route::get('/getProductsForCart', 'GameController@cartGames');

        //Reviews!!
        Route::post('/addReview', "CommentsController@store");
        Route::delete('/deleteComment', "CommentsController@destroy");

    });

});








