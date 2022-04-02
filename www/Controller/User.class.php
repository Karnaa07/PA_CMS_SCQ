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
        if(!isset($_COOKIE["Connected"]))
        {
            session_start();
            $request_method = strtoupper($_SERVER['REQUEST_METHOD']);
            $user = new UserModel();
            if ($request_method === 'GET') {
                // generate a token
                $_SESSION['token'] = bin2hex(random_bytes(35));
                $view = new View("login","front");
                $view->assign("user", $user);

                // show the form@
            } elseif ($request_method === 'POST') {
                
                $token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);
                $user->setUser();              
                if (!$token || $token !== $_SESSION['token']) {
                    // return 405 http status code
                    header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
                    exit;
                }
                $exist = $user->exist_user($_POST["email"],$_POST["password"]);
                if($exist["id"]){
                    setcookie('Connected',$_SESSION['token'],time()+1800); // L'utilisateur reste connecté 30 MINUTES
                    header('Location: dashboard');
                }
                else
                {
                    echo("Mot de passe ou utilisateur incorrect");
                }  
            }
        }
        else {
            header('Location: dashboard'); // Utilisateur déjà connecté
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
        header('Location: login');
       
    }
    public function pwdforget()
    {
        echo "Mot de passe oublié";
    }
}





