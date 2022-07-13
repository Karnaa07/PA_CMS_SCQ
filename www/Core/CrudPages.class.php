<?php 
namespace App\Core;
use App\Core\MysqlBuilder;


class CrudPages extends CrudAbstract
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

    public function display(){
        $req =  $this->builder-> select(DBPREFIXE.'page', ["idPage","name"])
        ->getQuery();
        var_dump($req);
        $queryPrepared = $this->pdo->prepare($req);
        $queryPrepared->execute();
        return $queryPrepared->fetchAll();
    }
    public function update($infos){

        $req = $this->builder-> update(DBPREFIXE."page", $infos)
        ->where("idPage",$infos['idPage'],"=")
        ->getQuery();
        var_dump($req);
        $queryPrepared = $this->pdo->prepare($req);
        $queryPrepared->execute();
        //var_dump($queryPrepared);
        //return "done";
    }

}
?>