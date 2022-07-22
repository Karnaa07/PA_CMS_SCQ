<?php

namespace App\Core;


class CleanWords // définition d'une classe de nétoyage de champs
{
    public static function lastname($lastname):string // Clean un nom de famille
    {
        return strtoupper(trim($lastname)); // On met les valeurs en majuscule 
    }
    public static function name($name):string
    {
        $name=trim($name);
        $name=str_replace("'","_",$name);
        return $name;
    }
    // Ajouter d'autres classes 
}