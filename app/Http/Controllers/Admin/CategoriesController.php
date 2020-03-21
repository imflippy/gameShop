<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Http\Services\BackWithError;
use App\Http\Services\LogCatchs;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $modelCategory;
    public function __construct()
    {
        $this->modelCategory = new Categories();
    }
    public function index()
    {
        $categories = $this->modelCategory->getAllCategoriesWithPaginate();
        return view('admin.pages.categories', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.categories_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCategoryRequest $request)
    {
        try {
            $this->modelCategory->addNewCategory($request);
            return redirect()->route('categories.index')->with('success', 'Category has been added');

        } catch (\PDOException $ex){
            LogCatchs::writeLog($ex->getMessage(), 'Admin\CategorisController@store');
            return BackWithError::backWtihError();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getCategory = $this->modelCategory->getOneCategory($id);

        return view('admin.pages.categories_edit', ['getCategory' => $getCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoryRequest $request, $id)
    {
        try {
            $this->modelCategory->updateCategory($request, $id);
            return redirect()->route('categories.index')->with('success', 'Category has been updated');
        } catch (\PDOException $ex) {
            LogCatchs::writeLog($ex->getMessage(), 'Admin\CategorisController@update');
            return BackWithError::backWtihError();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->modelCategory->removeCategory($id);
            return redirect()->route('categories.index')->with('success', 'Category has been removed');

        } catch (\PDOException $ex) {
            LogCatchs::writeLog($ex->getMessage(), 'Admin\CategorisController@destroy');
            return BackWithError::backWtihError();
        }
    }
}
