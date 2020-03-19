<?php
/*
* @created 17/03/2020 - 9:53 PM
* @author flippy
*/

namespace App\Models;


class GameGenres
{
    public function insertGameGenre($genre, $idGame) {
        \DB::table('games_genres')
            ->insert([
               'id_genre' => $genre,
                'id_game' => $idGame
            ])
           ;
    }

    public function deleteGame($id) {
        \DB::table('games_genres')
            ->where(['id_game' => $id])
            ->delete();
    }
}
