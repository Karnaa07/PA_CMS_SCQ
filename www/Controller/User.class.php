<?php
namespace App\Controller;

use App\Core\CleanWords;
use App\Core\Sql;
use App\Core\Verificator;
use App\Core\View;
use App\Model\User as UserModel;  // Alias de class User dans Model/User.class.php

class User {

    public function login()
    {
        $user = new UserModel(); // On appelle la classe User pour créer un objet $user
        var_dump($user->getId());
        if(!empty($_POST)){
            echo('Page Profil de '); // appelle Base SQL Pour écrire les données utilisateur 

            
             // Bouton deconnexion ?
        }
        else{
            $view = new View("login"); //,"back"); // On crée une page de vue en appelant le partial Login avec un template Back (back.tpl.php)
            $view->assign("user", $user); // On assigne la valeur user à la clé $user Pourquoi faire ?

        }
      
    }

    public function register()
    {

        $user = new UserModel();

        if( !empty($_POST)){

            $result = Verificator::checkForm($user->getRegisterForm(), $_POST);
            //dans le cas il n'y a pas d'erreur, et insertion en base de donnée
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST["password"]);
            $user->setFirstname($_POST["firstname"]);
            $user->setLastname($_POST["lastname"]);
            $user->generateToken();
            $user->save();

            print_r($result);

        }

        $view = new View("register");
        $view->assign("user", $user);
    }


    public function logout()
    {
        ?>
        <p> Ceci est un paragraphe de test </p>
        <?php
        // Gestion de déconnexion 
        //Supprimer le Token    

        echo "Se déco";
    }


    public function pwdforget()
    {
        echo "Mot de passe oublié";
    }

}





