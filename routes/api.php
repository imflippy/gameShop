<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Wishlist Page
//Route::get('/wishlist/{idu}', 'WishlistController@getAllWishes');
//Route::post('/addWish', 'GameController@addNewWish');

//Route::get('/getProductsForCart/{$ids?}', 'GameController@cartGames');

    Route::get('/getProductsForCart', 'GameController@cartGames');


