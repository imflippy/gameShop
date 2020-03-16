<?php
/*
* @created 14/03/2020 - 8:44 PM
* @author flippy
*/

namespace App\Http\Services;


use App\Models\Games;

class PriceWithDiscount
{

    public static function price_with_discount($idGame) {
        $modelGames = new Games();
        $game = $modelGames->price_with_discount($idGame);
        if ($game->discount) {
            return $game->price - $game->discount / 100 * $game->price;
        } else {
            return $game->price;
        }
    }

}
