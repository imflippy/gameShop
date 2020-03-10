<?php
/*
* @created 10/03/2020 - 12:50 AM
* @author flippy
*/

namespace App\Models;


class Wishes
{

    public function addwish($idGame, $idUser) {
        \DB::table('wishes')
            ->insert(['id_user' => $idUser, 'id_game' => $idGame, 'created_at' => date("Y-m-d H-i-s", time())]);
    }

    public function checkIfWishIsAlreadyInList($idGame, $idUser) {
        return \DB::table('wishes')
            ->where(['id_user' => $idUser, 'id_game' => $idGame])
            ->exists();
    }

    public function getAllWishesForOneUser($idUser) {
        return \DB::table('games')
            ->join('wishes', 'games.id_game', '=', 'wishes.id_game')
            ->join('users', 'wishes.id_user', '=', 'users.id_user')
            ->where(['users.id_user' => $idUser])
            ->get();
    }

    public function deleteWishFromWishes($idWish){
        \DB::table('wishes')->where(['id_wish' => $idWish])->delete();
    }

    public function numberOfWishes($idUser) {
        return \DB::table('wishes')
            ->where(['id_user' => $idUser])
            ->count();
    }
}
