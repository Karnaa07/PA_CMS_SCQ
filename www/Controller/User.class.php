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
        else{
            header('Location: dashboard');
        }
    }

    public function register()
    {

        $user = new UserModel();

        if(!empty($_POST)){
            $unicity=$user->getOneBy(["email"=>$_POST['email']]);
            if($unicity==null)
            {
                $result = Verificator::checkForm($user->getRegisterForm(), $_POST);
                //dans le cas il n'y a pas d'erreur, et insertion en base de donnée
                if(count($result)<1){
                    echo "ce mail n'existe pas, utilisateur enregistre";
                    $user->setUser();
                    $user->save();
                    print_r($result);
                }
                else{
                    echo $result[0];
                }
            }
            else{
                echo "ce mail existe deja";
            }

        }

        $view = new View("register");
        $view->assign("user", $user);
    }


    public function logout()
    {
        // Gestion de déconnexion 
        // Supprimer le Token    
        setcookie('token',"test",1);
        header('Location: dashboard');
       
    }


    public function pwdforget()
    {
        echo "Mot de passe oublié";
    }

}





