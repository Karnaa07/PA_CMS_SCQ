<?php

namespace App\Controller;

use App\Core\View;
//use App\Core\Sql;
use App\Core\MysqlBuilder;
use App\Core\Crud as CrudUser;
use App\Core\Permissions;
use App\Core\UserStats;
use App\Model\User as UserModel; 

class Admin
{

    public function dashboard()
    {
        $users = CrudUser ::getInstance();
        //$userModel = new UserModel();
        if (isset($_COOKIE['Connected']) && !empty($_COOKIE['Connected']) && isset($_COOKIE['id']) && !empty($_COOKIE['id'])) {
            $token = $users -> tokenReturn('user', $_COOKIE['id']);
            if ($token[0]['token'] == $_COOKIE['Connected']) {
                $perms = new Permissions();
                if ($perms->cando(3)) { // right Back end access
                    $view = new View("dashboard", "back"); // A l'appelle de contact on crée une vue de formumlaire de contact
                } else {
                    //http_response_code(403);
                    header("HTTP/1.1 403 No perms");
                }
            }else{
                header('Location: /login');
            }
        }else{
            header('Location: /login');
        }
    }   
    public function media()
    {
        $users = CrudUser ::getInstance();
        //$userModel = new UserModel();
        if (isset($_COOKIE['Connected']) && !empty($_COOKIE['Connected']) && isset($_COOKIE['id']) && !empty($_COOKIE['id'])) {
            $token = $users -> tokenReturn('user', $_COOKIE['id']);
            if ($token[0]['token'] == $_COOKIE['Connected']) {
                $perms = new Permissions();
                if ($perms->cando(3)) { // right  Back end access
                    $view = new View("media", "back");
                } else {
                    //http_response_code(403);
                    header("HTTP/1.1 403 No perms");
                }
            }else{
                header('Location: /login');
            }
        }
        else{
            header('Location: /login');
        }
    }
    public function user_settings()
    { 
        $users = CrudUser ::getInstance();
        //$userModel = new UserModel();
        if (isset($_COOKIE['Connected']) && !empty($_COOKIE['Connected']) && isset($_COOKIE['id']) && !empty($_COOKIE['id'])) {
            $token = $users -> tokenReturn('user', $_COOKIE['id']);
            if ($token[0]['token'] == $_COOKIE['Connected']) {
                $perms = new Permissions();
                if ($perms->cando(3)) { // right  Back end access

                    if ($_POST) { // Secu a revoir
                        if ($_POST['firstname']) {
                            var_dump('okay');
                            $users->updateUser($_POST);
                        } else {
                            var_dump('ok');
                            $users->deleteRow('user', 'id', $_POST['id']);
                        }
                    }

                    $tabData = $users->displayUsers();
                    $view = new View("user_settings", "back");
                    $view->assign("tabData", $tabData);
                    $view->assign("perms", $perms);
                } else {
                    //http_response_code(403);
                    header("HTTP/1.1 403 No perms");
                }
            }
            else{
                header('Location: /login');
            }
        }
        else{
            header('Location: /login');
        }
    }
    public function delete()
    {   if(!empty($_POST))
        {
            //var_dump($_POST);
        }   
    }
}