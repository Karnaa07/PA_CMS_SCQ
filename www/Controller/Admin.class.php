<?php

namespace App\Controller;

use App\Core\View;
use App\Core\MysqlBuilder;
use App\Core\CrudUsers;
use App\Model\User as UserModel; 
class Admin
{

    public function dashboard()
    {
        $view = new View("dashboard","back"); // A l'appelle de contact on crée une vue de formumlaire de contact
    }
    public function media()
    {
        $view = new View("media","back");
    }
    public function pages_settings()
    {
        $view = new View("pages_settings","back");
    }
    public function Testbuilder() {
        // $test = new MysqlBuilder();
        //  $query = $test 
        //     ->update("esgi_user", ["id"=>2,"email"=>"yalicheff.sebastien@gmail.com","password"=>"test","firstname"=>'test',"lastname"=>'test'])
        //     ->limit( 0, 1)
        //     ->getQuery();
        $view = new View("dashboard","back");    }
    public function user_settings()
    { 
        var_dump($_POST);
        if($_POST)
        {
            echo('<script>alert("test")</script>');
        }
        $users = new CrudUsers();
        $tabData = $users->displayUsers();
        $view = new View("user_settings","back");
        $view->assign("tabData", $tabData);      
    }
    public function delete()
    {   if(!empty($_POST))
        {
            var_dump($_POST);
        }   
    }


}