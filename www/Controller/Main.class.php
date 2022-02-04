<?php

namespace App\Controller;

use App\Core\View;

class Main {

    public function home()
    {
        echo "Page d'accueil";
    }


    public function contact()
    {
        $view = new View("contact");
    }



}