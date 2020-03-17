<?php
/*
* @created 28/02/2020 - 11:08 PM
* @author flippy
*/

namespace App\Models;


use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;

class Categories
{
    public function getAllCategories() {
        return \DB::table('categories')->get();
    }
    public function getAllCategoriesWithPaginate() {
        return \DB::table('categories')
            ->orderBy('updated_at', 'desc')
            ->paginate(15);
    }

    public function addNewCategory(AddCategoryRequest $request) {
        \DB::table('categories')
            ->insert([
               'category' => $request->input('category'),
                'created_at' => date("Y-m-d H-i-s", time()),
                'updated_at' => date("Y-m-d H-i-s", time()),
            ]);
    }

    public function removeCategory($id) {
        \DB::table('categories')->where([
            'id_category' => $id
        ])
            ->delete();
    }

    public function getOneCategory($id) {
        return \DB::table('categories')
            ->where(['id_category' => $id])
            ->first();
    }

    public function updateCategory(EditCategoryRequest $request, $id) {
        \DB::table('categories')
            ->where(['id_category' => $id])
            ->update([
                'category' => $request->input('category'),
                'updated_at' => date("Y-m-d H-i-s", time())
            ]);
    }

}
