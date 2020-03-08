<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterRequest;
use App\Http\Services\GetGamePhotos;
use App\Http\Services\UserWishes;
use App\Models\Categories;
use App\Models\Genres;
use App\Models\Games;
use Illuminate\Http\Request;

class GameController extends FrontEndController
{
    private $modelGenres;

    public function __construct()
    {
        parent::__construct();
        $this->modelGenres = new Genres();
    }

    public function single($id) {
        $game = $this->modelGames->getSingleGame($id);

        $this->data['game'] = $game;
        $this->data['numberOfWishes'] = UserWishes::numberUserWishes();

        return view("pages.singleGame", $this->data);
    }

    public function filter(FilterRequest $request) {
        $search = $request->input('search');
        $categoriesChb = $request->input('cat') ?? [];
        $genresChb = $request->input('genre') ?? [];
        $sortby = $request->input('sortby') ?? 'date';
        $showing = $request->input('showing') ?? 6;


        $this->data['genreChb'] = $genresChb;
        $this->data['categoriesChb'] = $categoriesChb;
        $this->data['searchOld'] = $search;
        $this->data['sortby'] = $sortby;
        $this->data['showing'] = $showing;


        $games = $this->modelGames->filter($search, $categoriesChb, $genresChb, $sortby, $showing);
        $genres = $this->modelGenres->getAllGenres();
        GetGamePhotos::getGamePhotos($games);

        $this->data['games'] = $games;
        $this->data['genres'] = $genres;
        $this->data['numberOfWishes'] = UserWishes::numberUserWishes();

        return view('pages.filte', $this->data);
    }


    // WISHES
    public function wishesPage() {
        $this->data['numberOfWishes'] = UserWishes::numberUserWishes();
        return view('pages.wishlish', $this->data);
    }

    public function addNewWish(Request $request) {
        $idGame = $request->input('idGame');

        if(!session()->has('user')) {
            return response(null, 401);
        }
        $idUser = session('user')->id_user;
        try {

            $checkIfWishlistIsEmpty = $this->modelGames->checkIfWishIsAlreadyInList($idGame, $idUser);
            if($checkIfWishlistIsEmpty) {
                return response('This game is alreay in the Wishlist', 200);
            }

            $this->modelGames->addwish($idGame, $idUser);
            return response('You have successfully added game to Wishlist', 201);

        } catch (\PDOException $ex) {
            return response($ex->getMessage(), 500);
        }
    }

    public function getAllWishesForOneUser() {

        $idUser = session('user')->id_user;

        try {
            $info = $this->modelGames->getAllWishesForOneUser($idUser);
            GetGamePhotos::getGamePhotos($info);

            return response($info);

        } catch (\PDOException $ex) {
            return response($ex->getMessage(), 500);
        }
    }

    public function deleteWishFromWishes(Request $request) {
        $idWish = $request->input('idWish');

        try {
            $this->modelGames->deleteWishFromWishes($idWish);

            return response(null, 204);
        } catch (\PDOException $ex) {
            return response($ex->getMessage(), 500);
        }

    }


    public function cartGames(Request $request) {
        $idGames = $request->input('idsProd');
        try {
            $info = $this->modelGames->getCartGames($idGames);
            GetGamePhotos::getGamePhotos($info);

            return response($info, 200);
        } catch (\PDOException $ex) {
            return response($ex->getMessage(), 500);
        }
    }



}
