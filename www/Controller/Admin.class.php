<?php

namespace App\Controller;

use App\Core\View;
use App\Core\MysqlBuilder;
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
    public function builder() {
        $test = new MysqlBuilder();
        $query = $test 
            ->select("esgi_user", ["id","email","password","firstname","lastname"])
            ->limit( 0, 1)
            ->getQuery();
        //var_dump( $db->pdo->query($query));
        //var_dump($avengers);
        // $sql = new Sql;
        // foreach($avengers as $avenger){
        //     echo $avenger->name.'<br>';
        // }
    }
    public function user_settings()
    {
        $user = new UserModel();
        $tabData = $user->Crud();
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