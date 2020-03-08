<?php
/*
* @created 28/02/2020 - 11:08 PM
* @author flippy
*/

namespace App\Models;


class Categories
{
    public function getAllCategories() {
        return \DB::table('categories')->get();
    }

}
