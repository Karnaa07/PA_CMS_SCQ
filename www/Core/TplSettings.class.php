<?php 
namespace App\Core;
use App\Core\MysqlBuilder;


class TplSettings
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
    public function displayStyles(){
        $req =  $this->builder-> select(DBPREFIXE.'tplsettings', ["*"])
        ->where("id",1,"=")
        ->getQuery();
        $queryPrepared = $this->pdo->prepare($req);
        $queryPrepared->execute();
        return $queryPrepared->fetchAll();
    }
}
?> 