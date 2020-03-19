<?php
/*
* @created 17/03/2020 - 9:40 PM
* @author flippy
*/

namespace App\Models;


class GamesPhotos
{
    public function insertGamePhotos($photo, $idGame) {
        \DB::table('game_photos')
            ->insert([
                'single_photo' => $photo,
                'id_game' => $idGame
            ])
           ;
    }

    public function deleteGame($id) {
        \DB::table('game_photos')
            ->where(['id_game' => $id])
            ->delete();
    }
    public function deleteRow($id) {
        \DB::table('game_photos')
            ->where('id_game_photos' , '=' , $id)
            ->delete();
    }
}
