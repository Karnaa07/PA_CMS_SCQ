<?php

namespace App\Controller;

use App\Core\View;
use App\Core\MysqlBuilder;
use App\Core\Crud;
use App\Core\Permissions;
use App\Model\User as UserModel; 

class Admin
{

    public function dashboard()
    {
        $perms = new Permissions();
        if($perms->cando(3)){ // right Back end access
            $view = new View("dashboard","back"); // A l'appelle de contact on crée une vue de formumlaire de contact
        } else {
            //http_response_code(403);
            header("HTTP/1.1 403 No perms");
        }
    }   
    public function media()
    {
        $perms = new Permissions();
        if($perms->cando(3)){ // right  Back end access
            $view = new View("media","back");
        } else {
            //http_response_code(403);
            header("HTTP/1.1 403 No perms");
        }
    }
    public function user_settings()
    { 
        $perms = new Permissions();
        if($perms->cando(3)){ // right  Back end access
            $users = new Crud();
            var_dump($_POST);

            if($_POST) // Secu a revoir
            {
                $users->updateUser($_POST);
            }

            $tabData = $users->displayUsers();
            $view = new View("user_settings","back");
            $view->assign("tabData", $tabData); 
            $view->assign("perms", $perms);
        } else {
            //http_response_code(403);
            header("HTTP/1.1 403 No perms");
        }
    }
    public function delete()
    {   if(!empty($_POST))
        {
            //var_dump($_POST);
        }   
    }
}