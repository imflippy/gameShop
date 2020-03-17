<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddGenreRequest;
use App\Http\Requests\EditGenreRequest;
use App\Models\Genres;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $modelGenre;
    public function __construct()
    {
        $this->modelGenre = new Genres();
    }
    public function index()
    {
        $genres = $this->modelGenre->getAllGenresWithPaginate();
        return view('admin.pages.genres', ['genres' => $genres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.genres_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddGenreRequest $request)
    {
        try {
            $this->modelGenre->addNewGenre($request);
            return redirect()->route('genres.index')->with('success', 'Genre has been added');

        } catch (\PDOException $ex){

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
        $getGenre = $this->modelGenre->getOneGenre($id);

        return view('admin.pages.genres_edit', ['getGenre' => $getGenre]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditGenreRequest $request, $id)
    {
        try {
            $this->modelGenre->updateGenre($request, $id);
            return redirect()->route('genres.index')->with('success', 'Genre has been updated');
        } catch (\PDOException $ex) {

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
        try {
            $this->modelGenre->removeGenre($id);
            return redirect()->route('genres.index')->with('success', 'Genre has been removed');

        } catch (\PDOException $ex) {

        }
    }
}
