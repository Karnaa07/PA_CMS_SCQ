<?php

namespace App\Controller;

use App\Core\View;

class Main { // Définition de la classe Main

    public function home()
    {
        $view = new View("dashboard","back");
    }


    public function contact()
    {
        $view = new View("contact"); // A l'appelle de contact on crée une vue de formumlaire de contact
    }
// TEST SEB
  
} 