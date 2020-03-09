<?php
/*
* @created 09/03/2020 - 1:09 AM
* @author flippy
*/

namespace App\Models;


use App\Http\Requests\ReviewRequest;

class Comments
{
    public function addReview(ReviewRequest $request) {
        \DB::table('comments')
            ->updateOrInsert([
                'stars' => $request->input('ratingValue'),
                'comment' => $request->input('comment'),
                'id_user' => session('user')->id_user,
                'id_game' => $request->input('idGame'),
                'created_at' => date("Y-m-d H-i-s", time()),
                'updated_at' => date("Y-m-d H-i-s", time())
            ]);
    }

    public function checkIfUserHasPostedReview(ReviewRequest $request) {
        return \DB::table('comments')
            ->where([
                'id_game' => $request->input('idGame'),
                'id_user' => session('user')->id_user
            ])
            ->first();
    }

    public function updateReview(ReviewRequest $request) {
        \DB::table('comments')
            ->where([
                'id_game' => $request->input('idGame'),
                'id_user' => session('user')->id_user
            ])
            ->update([
                'stars' => $request->input('ratingValue'),
                'comment' => $request->input('comment'),
                'updated_at' => date("Y-m-d H-i-s", time())
            ]);
    }

}