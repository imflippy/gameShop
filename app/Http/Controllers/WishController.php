<?php

namespace App\Http\Controllers;

use App\Http\Services\GetGamePhotos;
use App\Http\Services\LogCatchs;
use App\Models\Wishes;
use Illuminate\Http\Request;

class WishController extends Controller
{
    private $modelWishes;
    public function __construct()
    {
        $this->modelWishes = new Wishes();
    }

    public function addNewWish(Request $request) {
        $idGame = $request->input('idGame');

        if(!session()->has('user')) {
            return response(null, 401);
        }
        $idUser = session('user')->id_user;
        try {

            $checkIfWishlistIsEmpty = $this->modelWishes->checkIfWishIsAlreadyInList($idGame, $idUser);
            if($checkIfWishlistIsEmpty) {
                return response('This game is alreay in the Wishlist', 200);
            }

            $this->modelWishes->addwish($idGame, $idUser);
            LogCatchs::writeLogSuccess('User: ' . session('user')->username . ',  Action: Add Wish');

            return response('You have successfully added game to Wishlist', 201);

        } catch (\PDOException $ex) {
            LogCatchs::writeLog($ex->getMessage(), 'WishController@addNewWish');

            return response(null, 500);
        }
    }

    public function getAllWishesForOneUser() {

        $idUser = session('user')->id_user;

        try {
            $info = $this->modelWishes->getAllWishesForOneUser($idUser);
            GetGamePhotos::getGamePhotos($info);

            return response($info);

        } catch (\PDOException $ex) {
            LogCatchs::writeLog($ex->getMessage(), 'WishController@getAllWishesForOneUser');

            return response(null, 500);
        }
    }

    public function deleteWishFromWishes(Request $request) {
        $idWish = $request->input('idWish');

        try {
            $this->modelWishes->deleteWishFromWishes($idWish);
            LogCatchs::writeLogSuccess('User: ' . session('user')->username . ',  Action: Remove Wish');

            return response(null, 204);
        } catch (\PDOException $ex) {
            LogCatchs::writeLog($ex->getMessage(), 'WishController@deleteWishFromWishes');

            return response(null, 500);
        }

    }

    public function numberOfWishes() {

        $idUser = session('user')->id_user ?? 0;

        try {
            $info = $this->modelWishes->numberOfWishes($idUser);
            return response($info);

        } catch (\PDOException $ex) {
            LogCatchs::writeLog($ex->getMessage(), 'WishController@numberOfWishes');

            return response(null, 500);
        }
    }

}
