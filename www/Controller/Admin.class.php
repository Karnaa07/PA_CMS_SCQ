<?php

namespace App\Controller;


use App\Core\Sql;
use App\Core\View;
use App\Model\User as UserModel; 
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
    public function user_settings()
    {    
        $user = new UserModel();
        $tabData = $user->Crud();
        $view = new View("user_settings","back");
        $view->assign("tabData", $tabData);
        // foreach ($tabData as $tabData) {
        //     echo('<p>'.$tabData."\n"."</p>");
        // }
        
    }
}