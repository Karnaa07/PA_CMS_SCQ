<?php

namespace App\Controller;

use App\Core\View;
use App\Core\Permissions;

class Main { // Définition de la classe Main

    public function home()
    {
        $perms = new Permissions();
        if($perms->cando(3)){ // right  Back end access
            $view = new View("dashboard","back");
        } else {
            //http_response_code(403);
            header("HTTP/1.1 403 No perms");
        }    
       // var_dump($_SESSION);
    }

    public function contact()
    {
        $view = new View("contact"); // A l'appelle de contact on crée une vue de formumlaire de contact
    }

    public function delete(){
        echo "coucou";
    }
} 