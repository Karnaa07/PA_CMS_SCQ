<?php

namespace App\Controller;

use App\Core\View;
use App\Core\Permissions;
use App\Core\Crud as CrudUser;

class Main { // Définition de la classe Main

    public function home()
    {
        $users = CrudUser ::getInstance();
        if (isset($_COOKIE['Connected']) && !empty($_COOKIE['Connected']) && isset($_COOKIE['id']) && !empty($_COOKIE['id'])) {
            $token = $users -> tokenReturn('user', $_COOKIE['id']);
            if ($token[0]['token'] == $_COOKIE['Connected']) {
                $perms = new Permissions();
                if ($perms->cando(3)) { // right  Back end access
                    $view = new View("dashboard", "back");
                } else {
                    //http_response_code(403);
                    header("HTTP/1.1 403 No perms");
                }
            }else{
                header('Location : login');
            }
        }else{
            header('Location : login');
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