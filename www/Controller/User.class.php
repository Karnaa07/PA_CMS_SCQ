<?php
namespace App\Controller;

use App\Core\CleanWords;
use App\Core\Sql;
use App\Core\Verificator;
use App\Core\View;
use App\Model\User as UserModel;  // Alias de class User dans Model/User.class.php
use App\Core\Mail;
use App\Core\Permissions;

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
                if(!empty($_POST))
                {
                    $user->setUser();              
                    $exist = $user->exist_user('user',$_POST["email"],$_POST["password"]);
                    
                    if($exist["id"]){
                        // var_dump($exist['firstname']);
                        setcookie('Connected',$exist['firstname'],time()+3600); 
                        $view = new View("dashboard","back");
                        // var_dump($);
                        $user->setRole($exist['role_id']);
                        $perms = $user->getUserPerms($user->getRole());
                        foreach ($perms as $p) { $_SESSION["user"]["permissions"][] = $p["perm_id"]; }
                        // $_SESSION["user"]["permissions"]; 
                        // $user->setPerms($perms);
                        // var_dump($user->getPerms());
                        // var_dump($user);
                        // var_dump($exist);

                    }
                    else
                    {
                        echo("Mot de passe ou email incorrect");
                    }
                }
            }
        }
        else {
            //var_dump($_SESSION);
            header('Location: dashboard'); // Utilisateur déjà connecté
        }
    }
    public function register()
    {
        if(!isset($_COOKIE["Connected"])){
            $user = new UserModel();
            if(!empty($_POST)){
                $unicity=$user->getOneBy('user',["email"=>$_POST['email']]);
                if($unicity==null)
                {
                    $result = Verificator::checkForm($user->getRegisterForm(), $_POST);
                    //dans le cas il n'y a pas d'erreur, et insertion en base de donnée
                    if(count($result)<1){
                        echo "ce mail n'existe pas, utilisateur enregistre";
                        $user->setUser();
                        $user->save('user');
                        $mail = new Mail();
                        $mail->verif_account($user->getEmail(), $user->getFirstname(),bin2hex(random_bytes(10)));
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
        } else {
            header('Location: dashboard');
        }
    }
    public function logout()
    {
        // Gestion de déconnexion 
        // Supprimer le Token    
        $_SESSION = [];

        setcookie('Connected',"test",1);
        header('Location: login');
    }
    public function pwdforget()
    {
        $user = new UserModel();
        $unicity = new UserModel();
        if(!empty($_POST)){
            $unicity=$user->getOneBy('user',["email"=>$_POST['email']]);
            if($unicity!==null)
            {
                session_start();
                $pwd=substr(bin2hex(random_bytes(128)), 0, 15);
                $user->setPassword($pwd);
                $reset = [
                    'id' =>  $unicity['id'],
                    'password'=> $user->getPassword(),
                ];
                $user->setResetedPwd($reset);
                //envoyer par mail le pwd
                $mail = new Mail();
                $mail-> pwd_forget_mail($_POST['email'],$pwd);
                $view = new View("login");
                $view->assign("user", $user);          
            }
            else{
                echo $_POST["email"]."<br>";
                echo "ce mail n'existe pas";
            }
        }
        else{
            $view = new View("forgetPassword");
            $view->assign("user", $user);
            echo "Mot de passe oublié";
        }
    }

    public function verificated(){
        if(isset($_GET)){
            $user = new UserModel();
            $user->setBasicUser(['name'=>$_GET['name'],'email'=>$_GET['email']]);
            $view = new View("accountActivated");
            $view->assign("user", $user);
            echo('<br><br>');
            var_dump($_GET);
        }
    }
}






