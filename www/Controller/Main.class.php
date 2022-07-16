<?php

namespace App\Controller;

use App\Core\View;
use App\Core\Permissions;
use App\Core\UserStats;


class Main { // Définition de la classe Main

    public function home()
    {
        $perms = new Permissions();
        if($perms->cando(3) && isset($_SESSION["user"]) ){ 
            //var_dump($_SESSION["user"]);
            $stats = new UserStats();
            $registeredStats = $stats-> registeredStats();
            $mapDatas = $stats-> users_country();
            $view = new View("dashboard","back"); 
            $view->assign('datas',[$registeredStats,$mapDatas]);
  
        } else {
            //http_response_code(403);
            header("HTTP/1.1 403 No perms");
        }
    } 

    public function contact()
    {
        $view = new View("contact"); // A l'appelle de contact on crée une vue de formumlaire de contact
    }

    public function delete(){
        echo "coucou";
    }
} 