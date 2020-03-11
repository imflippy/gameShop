<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterRequest;
use App\Http\Services\GetGamePhotos;
use App\Http\Services\GetGamesStars;
use App\Http\Services\UserWishes;
use App\Models\Categories;
use App\Models\Games;
use App\Models\Genres;

class FrontEndController extends Controller
{
    protected $data;
    protected $modelCategories;
    protected $modelGames;
    protected $modelGenres;

    public function __construct()
    {
        $this->modelCategories = new Categories();
        $this->modelGames = new Games();
        $this->modelGenres = new Genres();
        $categories = $this->modelCategories->getAllCategories();
        $this->data['categories'] = $categories;

    }

    // home page
    public function home() {
        $games = $this->modelGames->getTo6Games();
        GetGamePhotos::getGamePhotos($games);
        GetGamesStars::getGamePhotos($games);

        $slider = $this->modelGames->getTop3UpdatedGamesWithBiggestDiscout();
        GetGamePhotos::getGamePhotos($slider);

        $this->data['games'] = $games;
        $this->data['slider'] = $slider;
        return view("pages.home", $this->data);
    }

    //shop page
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
        GetGamesStars::getGamePhotos($games);

        $this->data['games'] = $games;
        $this->data['genres'] = $genres;

        return view('pages.filte', $this->data);
    }

    //single game page
    public function single($id) {
        $game = $this->modelGames->getSingleGame($id);

        if(!$game) {
            return abort(404);
        }
        $this->data['game'] = $game;
        return view("pages.singleGame", $this->data);
    }


    // WISHES page
    public function wishesPage() {
        return view('pages.wishlish', $this->data);
    }

    // login page
    public function indexLogin() {

        $form = [
            [
                "type" => 'text',
                "name" => 'username',
                "placeholder" => "Type your username"
            ],
            [
                "type" => 'password',
                "name" => 'password',
                "placeholder" => "Type your password"
            ]
        ];

        $button = [
            "name" => "login",
            "value" => "LOGIN",
            "type" => "submit"
        ];

        $this->data['form'] = $form;
        $this->data['button']  =$button;

        return view("pages.login", $this->data);
    }

    //register page
    public function indexRegister() {
        $form = [
            [
                "name" => 'username',
                "placeholder" => "Your username here",
                "value" => old('username')
            ],
            [
                "type" => 'email',
                "name" => 'email',
                "placeholder" => "Your email here",
                "value" =>  old('email')
            ],
            [
                "type" => 'password',
                "name" => 'password',
                "placeholder" => "Enter passward"
            ],
            [
                "type" => 'password',
                "name" => 'confirmPassword',
                "placeholder" => "Confirm password"
            ]
        ];
        $button = [
            "name" => "register",
            "value" => "register",
            "type" => "submit"
        ];

        $this->data['form'] = $form;
        $this->data['button'] = $button;

        return view("pages.register", $this->data);
    }
    //contact page
    public function contactPage() {
        return view('pages.contact', $this->data);
    }
}
