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


    public function __construct()
    {
        parent::__construct();

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
