<?php

namespace App\Http\Controllers;

use App\Http\Services\GetGamePhotos;
use App\Http\Services\UserWishes;
use App\Models\Categories;
use App\Models\Games;
use Illuminate\Http\Request;

class HomeController extends FrontEndController
{

    public function __construct()
    {
        parent::__construct();

    }

    public function index() {
        $games = $this->modelGames->getTo6Games();
        GetGamePhotos::getGamePhotos($games);

        $this->data['numberOfWishes'] = UserWishes::numberUserWishes();
        $this->data['games'] = $games;
        return view("pages.home", $this->data);
    }
}
