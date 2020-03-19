<?php
/*
* @created 17/03/2020 - 7:14 PM
* @author flippy
*/

namespace App\Http\Services;



class MovePhotosReturnNames
{

    public static function getArrayNames($request) {
        $arrayPhotos = $request->file('photos_game');
        $photosNames = [];
        foreach ($arrayPhotos as $ap) {
            $photosName = time(). "_". $ap->getClientOriginalName();
            $photosNames[] = $photosName;
            $ap->move(public_path() . "/assets/images/product/", $photosName);
        }
        return $photosNames;
    }
}
