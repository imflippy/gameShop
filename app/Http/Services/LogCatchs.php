<?php
/*
* @created 21/03/2020 - 10:44 PM
* @author flippy
*/

namespace App\Http\Services;


class LogCatchs
{

    public static function writeLog ($ex, $msg) {
        \Log::channel('single')->error( $msg . ", With bug: ". $ex);
    }
}
