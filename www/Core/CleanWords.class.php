<?php

namespace App\Core;


class CleanWords
{

    public static function lastname($lastname):string
    {
        return strtoupper(trim($lastname));
    }

}