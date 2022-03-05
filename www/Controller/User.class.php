<?php
namespace App\Controller;

use App\Core\CleanWords;
use App\Core\Sql;
use App\Core\Verificator;
use App\Core\View;
use App\Model\User as UserModel;  // Alias de class User dans Model/User.class.php

class User {

    public function login() //login
    {

        if(!isset($_COOKIE['token']))
        {
            $user = new UserModel();
            session_start();
            if(!empty($_POST))
                {
                    $user->setUser();              
                    $exist = $user->exist_user($_POST["email"],$_POST["password"]);
                    if($exist["id"]){
                        header('Location: dashboard');
                    }
                    else
                    {
                        echo("Mot de passe ou utilisateur incorrect");
                    }
                }
                else {
                    $view = new View("login","front"); // On crée une page de vue en appelant le partial Login avec un template front (front.tpl.php)    
                    $view->assign("user", $user);
                }
        }
        else{
            header('Location: dashboard');
        }
    }

    public function register()
    {

        $user = new UserModel();

        if(!empty($_POST)){

            $result = Verificator::checkForm($user->getRegisterForm(), $_POST);
            //dans le cas il n'y a pas d'erreur, et insertion en base de donnée
            $user->setUser();
            $user->save();
            print_r($result);
        }

        $view = new View("register");
        $view->assign("user", $user);
    }


    public function logout()
    {
        // Gestion de déconnexion 
        // Supprimer le Token    
        setcookie('token',"test",1);
        header('Location: login');
       
    }


    public function pwdforget()
    {
        echo "Mot de passe oublié";
    }

}





