<?php
namespace App\Controller;

use App\Core\CleanWords;
use App\Core\Sql;
use App\Core\Verificator;
use App\Core\View;
use App\Model\User as UserModel;  // Alias de class User dans Model/User.class.php
use App\Core\Mail;

class User {

    public function login() //login
    {

        $Mail= new Mail();
        $Mail->send_mail();

        $user = new UserModel();
        if(!empty($_POST))
        {
            $user->setUser();
            $exist = $user->exist_user($_POST["email"],$_POST["password"]);
            if($exist["id"]){
                session_start();
                $_SESSION['id'] = $exist['id'];
                $_SESSION['firstname'] = $exist['firstname']; 
                $view = new View("dashboard","back");
            }
            else
            {
                echo("Nom de compte ou mot de passe incorrect");
            }

        }
        else {
            $view = new View("login","front"); // On crée une page de vue en appelant le partial Login avec un template front (front.tpl.php)    
            $view->assign("user", $user);
    
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
        ?>
        <p> Ceci est un paragraphe de test </p>
        <?php
        // Gestion de déconnexion 
        // Supprimer le Token    

        echo "Se déco";
    }


    public function pwdforget()
    {
        echo "Mot de passe oublié";
    }

}





