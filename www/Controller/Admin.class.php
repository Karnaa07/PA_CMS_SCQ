<?php

namespace App\Controller;

use App\Core\View;
use App\Core\MysqlBuilder;
use App\Core\CrudUsers;
use App\Model\User as UserModel; 
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
    public function user_settings()
    { 
        $users = new CrudUsers();
        if($_POST) // Secu a revoir
        {
            $users->updateUser($_POST);
        }

        $tabData = $users->displayUsers();
        $view = new View("user_settings","back");
        $view->assign("tabData", $tabData);      
    }
    public function delete()
    {   if(!empty($_POST))
        {
            //var_dump($_POST);
        }   
    }
}