<?php

namespace App\Controller;

use App\Core\View;
use App\Core\Permissions;

class about { // Définition de la classe Main

    public function aboutUs()
    {
        $perms = new Permissions();
        if($perms->cando(3)){ // right  Back end access
            $view = new View("about","back");
        } else {
            //http_response_code(403);
            header("HTTP/1.1 403 No perms");
        }    

    }
}