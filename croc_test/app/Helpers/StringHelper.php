<?php

namespace App\Helpers;

class StringHelper {

    public static function truncate($string, $length = 150) {

        $limit = abs((int)$length);
        if(strlen($string) > $limit) {
            $string = preg_replace("/^(.{1,$limit})(\s.*|$)/s", '\1...', $string);
        }
        return $string;

    }
}