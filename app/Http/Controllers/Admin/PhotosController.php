<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\BackWithError;
use App\Models\GamesPhotos;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    private $modelGamesPhotos;

    public function __construct()
    {
        $this->modelGamesPhotos = new GamesPhotos();
    }

    public function destroy($id) {
        try {
            $this->modelGamesPhotos->deleteRow($id);
            return redirect()->back()->with('success', 'Photo has been deleted');
        } catch (\PDOException $ex) {

            return BackWithError::backWtihError();
        }
    }
}
