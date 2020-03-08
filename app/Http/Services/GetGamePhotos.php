<?php
/*
* @created 08/03/2020 - 1:18 AM
* @author flippy
*/

namespace App\Http\Services;


use App\Models\Games;

class GetGamePhotos
{

    public static function getGamePhotos($games) {
        foreach ($games as $g) {
            $modelGames = new Games();
            $photos = $modelGames->getSingleGamePhotos($g->id_game);
            $g->photos = $photos;
        }
    }

}
