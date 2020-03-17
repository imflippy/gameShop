<?php
/*
* @created 01/03/2020 - 12:47 AM
* @author flippy
*/

namespace App\Models;


use App\Http\Requests\AddGenreRequest;
use App\Http\Requests\EditGenreRequest;

class Genres
{
    public function getAllGenres() {
        return \DB::table('genres')
                ->get();
    }

    public function getAllGenresWithPaginate() {
        return \DB::table('genres')
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
    }

    public function addNewGenre(AddGenreRequest $request) {
        \DB::table('genres')
            ->insert([
                'genre' => $request->input('genre'),
                'created_at' => date("Y-m-d H-i-s", time()),
                'updated_at' => date("Y-m-d H-i-s", time()),
            ]);
    }

    public function removeGenre($id) {
        \DB::table('genres')->where([
            'id_genre' => $id
        ])
            ->delete();
    }

    public function getOneGenre($id) {
        return \DB::table('genres')
            ->where(['id_genre' => $id])
            ->first();
    }

    public function updateGenre(EditGenreRequest $request, $id) {
        \DB::table('genres')
            ->where(['id_genre' => $id])
            ->update([
                'genre' => $request->input('genre'),
                'updated_at' => date("Y-m-d H-i-s", time())
            ]);
    }
}
