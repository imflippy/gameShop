<?php
/*
* @created 17/03/2020 - 10:44 PM
* @author flippy
*/

namespace App\Http\Services;


class BackWithError
{
    public static function backWtihError($msg = 'Something went wrong. We will fix ASAP'){
        return redirect()->back()->with('error', $msg);
    }
}
