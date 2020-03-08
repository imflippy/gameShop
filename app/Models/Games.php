<?php
/*
* @created 29/02/2020 - 12:04 AM
* @author flippy
*/

namespace App\Models;


class Games
{
    public function getTo6Games() {
        return \DB::table('games')
            ->join('categories', 'games.id_category', '=', 'categories.id_category')
            ->latest()
            ->limit(6)
            ->get();
    }

    public function getPhotosForGame($idGame) {
        return \DB::table('games')
            ->join('game_photos', 'games.id_game', '=', 'game_photos.id_game')
            ->where(['id_game' => $idGame]);
    }

    public function getSingleGameGenress($id) {
        return \DB::table('games')
            ->join('games_genres', 'games.id_game', '=', 'games_genres.id_game')
            ->join('genres', 'games_genres.id_genre', '=', 'genres.id_genre')
            ->select('genres.*')
            ->where('games.id_game', '=', $id)
            ->get();
    }

    public function getSingleGamePhotos($id) {
        return \DB::table('game_photos')
            ->where('id_game', '=', $id)
            ->get();
    }

    public function getSingleGame($id) {
        $gameDetails =  \DB::table('games')
            ->join('categories', 'games.id_category', '=', 'categories.id_category')
            ->where('games.id_game', '=', $id)
            ->first();

        $gameDetails->genres = $this->getSingleGameGenress($id);
        $gameDetails->photos = $this->getSingleGamePhotos($id);

        return $gameDetails;
    }

    public function filter($search, $categories, $genre, $sortby, $showing) {
        $query = \DB::table('games');

        if($search) {
            $query = $query->where('game_name', 'like', '%'.$search.'%');
        }
        $query = $query->join('categories', 'games.id_category', '=', 'categories.id_category');

        if($categories) {
            $query = $query->whereIn('categories.id_category', $categories);
        }
        if($genre) {
            $query = $query ->join('games_genres', 'games.id_game', '=', 'games_genres.id_game')
                            ->join('genres', 'games_genres.id_genre', '=', 'genres.id_genre')
                            ->whereIn('genres.id_genre', $genre);
        }

        switch ($sortby) {
            case 'date':
                $query = $query->latest();
                break;
            case 'priceasc':
                $query = $query->orderBy('games.price', 'asc');
                break;
            case 'pricedesc':
                $query = $query->orderBy('games.price', 'desc');
                break;
        }

        $query = $query->paginate($showing);
        return $query;
    }


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

    public function getCartGames($idGames) {
        return \DB::table('games')->whereIn('id_game', $idGames)->get();
    }

    public function numberOfWishes($idUser) {
        return \DB::table('wishes')
            ->where(['id_user' => $idUser])
            ->count();
    }

}