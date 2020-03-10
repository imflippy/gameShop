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

        return view('pages.filte', $this->data);
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
