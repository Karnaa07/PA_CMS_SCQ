<?php

namespace App\Controller;

use App\Core\View;

class Main { // Définition de la classe Main

    public function home()
    {
        echo "Page d'accueil"; 
    }


    public function contact()
    {
        $view = new View("contact"); // A l'appelle de contact on crée une vue de formumlaire de contact
    }



}