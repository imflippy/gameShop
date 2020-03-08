<?php
/*
* @created 01/03/2020 - 12:47 AM
* @author flippy
*/

namespace App\Models;


class Genres
{
    public function getAllGenres() {
        return \DB::table('genres')
                ->get();
    }
}
