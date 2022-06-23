<?php 
namespace App\Core;
use App\Core\MysqlBuilder;


class CrudUsers 
{
    public function __construct()
    {
        $this->builder = new MysqlBuilder();
        try{
            $this->pdo = new \PDO( DBDRIVER.":host=".DBHOST.";port=".DBPORT.";dbname=".DBNAME,DBUSER, DBPWD);
        }catch (\Exception $e){
            die("Erreur SQL : ".$e->getMessage());
        }
    }

    public function displayUsers(){
        $req =  $this->builder-> select('esgi_user', ["email","firstname","lastname"])
        ->getQuery();
        // var_dump($req);
        $queryPrepared = $this->pdo->prepare($req);
        $queryPrepared->execute();
        return $queryPrepared->fetchAll();
    }
    public function updateUser($infos){

        $req = $this->builder-> update('esgi_user', $infos)
        ->where("email",$infos['email'],"=")
        ->getQuery();


        $queryPrepared = $this->pdo->prepare($req);
        $queryPrepared->execute();
        var_dump($queryPrepared);
        return "done";
    }

}
?>