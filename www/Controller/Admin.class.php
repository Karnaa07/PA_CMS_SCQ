<?php

namespace App\Controller;

use App\Core\View;
// Controller : 
// Il va s'occupper de recevoir les données entrées par l'utilisateur et 
// de communiquer les changements aux modèles

class Admin
// Classe ADMIN 
{

    public function dashboard()
    {
        $view = new View("dashboard","back"); // A l'appelle de contact on crée une vue de formumlaire de contact
    }


}