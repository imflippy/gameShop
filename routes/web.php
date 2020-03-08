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

//Register Controller
Route::get('/register', 'AuthController@indexRegister')->name('register');
Route::post('/register', 'AuthController@doRegister')->name('doRegister');
Route::get('/confirm/{token}', 'AuthController@confirmRegister')->where('token', '[a-z0-9A-Z]+');
Route::patch('/reset', 'AuthController@reset')->name('reset');


//Login Controller
Route::get('/login', 'AuthController@indexLogin')->name('login');
Route::post('/login', 'AuthController@doLogin');
Route::get('logout', 'AuthController@logout');


Route::group(['middleware'  => ['authorise']], function () {
    //Wishlist Page
    Route::get('/wishlist', 'GameController@wishesPage')->name('wishlist');






    //API PREFIX
    Route::prefix('api')->group(function () {
        //Wishlist Page
        Route::get('/wishlist', 'GameController@getAllWishesForOneUser');
        Route::post('/addWish', 'GameController@addNewWish');
        Route::delete('/deleteWish', 'GameController@deleteWishFromWishes');


//        Route::get('/getProductsForCart', 'GameController@cartGames');
    });

});


//Testing


//Pera







