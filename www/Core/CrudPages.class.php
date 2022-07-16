<?php 
namespace App\Core;
use App\Core\MysqlBuilder;


class CrudPages 
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

    public function displayPages(){
        $req =  $this->builder-> select('waterlily_page', ["idPage","name"])
        ->getQuery();
        var_dump($req);
        $queryPrepared = $this->pdo->prepare($req);
        $queryPrepared->execute();
        return $queryPrepared->fetchAll();
    }
    public function updatePages($infos){

        $req = $this->builder-> update(DBPREFIXE."page", $infos)
        ->where("idPage",$infos['idPage'],"=")
        ->getQuery();
        var_dump($req);
        $queryPrepared = $this->pdo->prepare($req);
        $queryPrepared->execute();
        //var_dump($queryPrepared);
        //return "done";
    }
    public function deleteRow(string $table, string $column, string $id){
        $tableBD=DBPREFIXE.$table;
        $req = $this->builder-> delete($tableBD)
        ->where($column,$id,"=")
        ->getQuery();
        $queryPrepared = $this->pdo->query($req);
        var_dump($req);
    }

}
?>