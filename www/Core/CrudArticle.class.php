<?php 
namespace App\Core;
use App\Core\MysqlBuilder;


class CrudArticle extends CrudAbstract
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

    public function getArticles(){
        $req =  $this->builder-> select('waterlily_article', ["idArticle","title","content","idCategory","idPage","createdAt"])
        //->join("","")
        ->getQuery();
        $queryPrepared = $this->pdo->prepare($req);
        $queryPrepared->execute();
        return $queryPrepared->fetchAll();
    }
    
    public function update($infos){

        $req = $this->builder-> update(DBPREFIXE."article", $infos)
        ->where("idArticle",$infos['idArticle'],"=")
        ->getQuery();
        $queryPrepared = $this->pdo->prepare($req);
        $queryPrepared->execute();
        //var_dump($queryPrepared);
        //return "done";
    }

    // public function nameArticle(string $table, int $id){
    //     $tableBD=DBPREFIXE.$table;
    //     $req = $this->builder-> select($tableBD, ['name'])
    //     ->where('idPage',$id,"=")
    //     ->getQuery();
    //     $queryPrepared = $this->pdo->query($req);
    //     return $queryPrepared->fetchAll();
    //}

}
?>