<?php

namespace App\Controller;

use App\Core\View;
// Controller : 
// Il va s'occupper de recevoir les données entrées par l'utilisateur et 
// de communiquer les changements aux modèles

class Admin
{

    public function dashboard()
    {
        $view = new View("dashboard","back"); // A l'appelle de contact on crée une vue de formumlaire de contact
    }
    public function media()
    {
        $view = new View("media","back");
    }
    public function pages_settings()
    {
        $view = new View("pages_settings","back");
    }
}