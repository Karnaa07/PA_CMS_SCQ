<?php
namespace App\Controller;

use App\Core\View;
use App\Core\InstallSettings;

use App\Model\User as UserModel; 


class Installer { // Définition de la classe Main

    public function install()
    {
        // var_dump('test');
        if(isset($_POST['lastname'])) 
        {            
            var_dump($_POST);
            $setup =  new InstallSettings();
            // $sql = $setup->SetUpSQL();
            // $setup->setConfFile();
            // if($sql){
            //     $admin = new UserModel();
            //     $admin->setUser();
            //     $admin->setRole(1);
            //     $admin->save('user');
            // }
            // $setup->delInstaller();
            // $view = new View("login","singlePage");

        } else {
            $view = new View("setup","singlePage");
            var_dump('test');
        }
    }  
}
