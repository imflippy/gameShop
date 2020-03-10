<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
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
            return response($ex->getMessage(), 500);
        }

    }


    public function store(ReviewRequest $request) {

        if($this->modelCommments->checkIfUserHasPostedReview($request)){
            $this->modelCommments->updateReview($request);
            return response(null, 204);
        }
        try {
            $this->modelCommments->addReview($request);
            return response(null, 201);
        } catch (\PDOException $ex){
            return response($ex->getMessage(), 500);
        }
    }


    public function destroy(Request $request) {
        try {
            $this->modelCommments->deleteComment($request);
            return response(null, 204);
        } catch (\PDOException $ex) {
            return response($ex->getMessage(), 500);
        }
    }
}
