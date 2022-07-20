<?php
namespace App\Controller;

use App\Core\Installateur;
use App\Core\View;
use App\Model\User as UserModel;

class Installer { // Définition de la classe Main

    public function install()
    {
        // var_dump('test');
        if(isset($_POST['lastname'])) 
        {            
            var_dump($_POST);
            $setup =  new Installateur();        
            //var_dump($setup);    
            $sql = $setup->SetUpSQL();
            $test = $setup->setConfFile();
            if($test){
                $setup->setAdmin();                
            }
            $setup->delInstaller();
            header("Location: /login");
        } else {
            $view = new View("setup","singlePage");
            var_dump('test');
        }
    }  
}
