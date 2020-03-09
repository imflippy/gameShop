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


    public function store(ReviewRequest $request) {

        if($this->modelCommments->checkIfUserHasPostedReview($request)){
            $this->modelCommments->updateReview($request);
            return response(null, 204);
        }
        try {
            $this->modelCommments->addReview($request);
            return response(null, 201);
        } catch (\PDOException $ex){
            return response($ex->getMessage());
        }
    }
}
