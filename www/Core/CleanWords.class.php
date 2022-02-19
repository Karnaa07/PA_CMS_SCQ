<?php

namespace App\Core;


class CleanWords // définition d'une classe de nétoyage de champs
{
    public static function lastname($lastname):string // Clean un nom de famille
    {
        return strtoupper(trim($lastname)); // On met les valeurs en majuscule 
    }
    // Ajouter d'autres classes 
}