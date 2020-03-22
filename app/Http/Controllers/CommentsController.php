<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Http\Services\LogCatchs;
use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    private $modelCommments;

    public function __construct()
    {
        $this->modelCommments = new Comments();
    }

    public function index(Request $request) {
        try {
            return response($this->modelCommments->getAllReviewsForOneGame($request), 200);
        } catch (\PDOException $ex) {
            LogCatchs::writeLog($ex->getMessage(), 'CommentsController@index');

            return response(null, 500);
        }

    }


    public function store(ReviewRequest $request) {

        if($this->modelCommments->checkIfUserHasPostedReview($request)){
            $this->modelCommments->updateReview($request);
            LogCatchs::writeLogSuccess('User: ' . session('user')->username . ',  Action: Edit Comment');

            return response(null, 204);
        }
        try {
            $this->modelCommments->addReview($request);
            LogCatchs::writeLogSuccess('User: ' . session('user')->username . ',  Action: Add Comment');
            return response(null, 201);
        } catch (\PDOException $ex){
            LogCatchs::writeLog($ex->getMessage(), 'CommentsController@store');
            return response(null, 500);
        }
    }


    public function destroy(Request $request) {
        try {
            $this->modelCommments->deleteComment($request);
            LogCatchs::writeLogSuccess('User: ' . session('user')->username . ',  Action: Remove Comment');
            return response(null, 204);
        } catch (\PDOException $ex) {
            LogCatchs::writeLog($ex->getMessage(), 'CommentsController@destroy');
            return response(null, 500);
        }
    }
}
