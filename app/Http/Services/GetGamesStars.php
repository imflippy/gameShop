<?php
/*
* @created 11/03/2020 - 1:10 AM
* @author flippy
*/

namespace App\Http\Services;


use App\Models\Comments;


class GetGamesStars
{
    public static function getGamePhotos($games) {
        foreach ($games as $g) {
            $modelComments = new Comments();
            $stars = $modelComments->getSingleGameStars($g->id_game);
            $g->stars = $stars;
        }
    }
}
