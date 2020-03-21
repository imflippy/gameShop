<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddGameRequest;
use App\Http\Requests\EditGameRequest;
use App\Http\Services\BackWithError;
use App\Http\Services\LogCatchs;
use App\Http\Services\MovePhotosReturnNames;
use App\Models\Categories;
use App\Models\Comments;
use App\Models\GameGenres;
use App\Models\Games;
use App\Models\GamesPhotos;
use App\Models\Genres;
use App\Models\Wishes;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $modelGames;
    private $modelGamesPhoto;
    private $modelGamesGenres;
    public function __construct()
    {
        $this->modelGames = new Games();
        $this->modelGamesPhoto = new GamesPhotos();
        $this->modelGamesGenres = new GameGenres();
    }

    public function index()
    {
        $games = $this->modelGames->getAllGamesWithPagination();

        return view('admin.pages.games', ['games' => $games]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modelCategories = new Categories();
        $modelGenres = new Genres();
        $categories = $modelCategories->getAllCategories();
        $genres = $modelGenres->getAllGenres();
        return view('admin.pages.games_create', ['categories' => $categories, 'genres' => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddGameRequest $request)
    {
        $photosNames =  MovePhotosReturnNames::getArrayNames($request);
        \DB::beginTransaction();
        try {
            $idGame = $this->modelGames->insertGame($request);
            foreach ($photosNames as $photo) {
                $this->modelGamesPhoto->insertGamePhotos($photo, $idGame);
            }

            foreach ($request->input('genresChb') as $genre) {
                $this->modelGamesGenres->insertGameGenre($genre, $idGame);
            }
            \DB::commit();
            return redirect()->route('games.index')->with('success', 'Game has been added');
        } catch (\PDOException $ex) {
            \DB::rollBack();
            LogCatchs::writeLog($ex->getMessage(), 'Admin\GamesController@store');
            return BackWithError::backWtihError();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelCategories = new Categories();
        $modelGenres = new Genres();
        $categories = $modelCategories->getAllCategories();
        $genres = $modelGenres->getAllGenres();
        $singleGame = $this->modelGames->getSingleGame($id);

//        dd($singleGame);
        return view('admin.pages.games_edit', ['categories' => $categories, 'genres' => $genres, 'singleGame' => $singleGame]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditGameRequest $request, $id)
    {

        \DB::beginTransaction();

        try {
            $this->modelGamesGenres->deleteGame($id);

            $this->modelGames->updateGame($request, $id);
            if($request->file('photos_game')){
                $photosNames =  MovePhotosReturnNames::getArrayNames($request);
                foreach ($photosNames as $photo) {
                    $this->modelGamesPhoto->insertGamePhotos($photo, $id);
                }
            }

            foreach ($request->input('genresChb') as $genre) {
                $this->modelGamesGenres->insertGameGenre($genre, $id);
            }
            \DB::commit();
            return redirect()->route('games.index')->with('success', 'Game has been updated');
        } catch (\PDOException $ex) {
            \DB::rollBack();
            LogCatchs::writeLog($ex->getMessage(), 'Admin\GamesController@update');
            return BackWithError::backWtihError();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modelWishes = new Wishes();
        $modelComments = new Comments();
        \DB::beginTransaction();
        try {

            $this->modelGamesPhoto->deleteGame($id);
            $this->modelGamesGenres->deleteGame($id);
            $modelWishes->deleteWishWithIdGame($id);
            $modelComments->deleteCommentWithidGame($id);
            $this->modelGames->deleteGame($id);
            \DB::commit();

            return redirect()->route('games.index')->with('success', 'Game has been deleted');
        } catch (\PDOException $ex) {

            \DB::rollBack();
            LogCatchs::writeLog($ex->getMessage(), 'Admin\GamesController@destroy');
            return BackWithError::backWtihError('You cant remove this game becouse its in orders.');
        }
    }


}
