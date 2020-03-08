<?php
/*
* @created 08/03/2020 - 2:28 AM
* @author flippy
*/

namespace App\Http\Services;


use App\Models\Games;

class UserWishes
{
    public static function numberUserWishes() {
        $modelGames = new Games();

        if (session()->has('user')){
            $numberOfWishes =  $modelGames->numberOfWishes(session('user')->id_user);
        } else {
            $numberOfWishes =  0;
        }

        return $numberOfWishes;

    }
}
