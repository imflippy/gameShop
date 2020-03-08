<?php

namespace App\Http\Controllers;

use App\Http\Services\UserWishes;
use App\Models\Categories;
use App\Models\Games;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class FrontEndController extends Controller
{
    protected $data;
    protected $modelCategories;
    protected $modelGames;

    protected function __construct()
    {
        $this->modelCategories = new Categories();
        $this->modelGames = new Games();

        $categories = $this->modelCategories->getAllCategories();
        $this->data['categories'] = $categories;

    }


}
