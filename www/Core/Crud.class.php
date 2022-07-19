<?php 
namespace App\Core;
use App\Core\MysqlBuilder;


class Crud extends CrudAbstract
{
    private static $instance= null;
    public function __construct()
    {
        $this->builder = new MysqlBuilder();
        try{
            $this->pdo = new \PDO( DBDRIVER.":host=".DBHOST.";port=".DBPORT.";dbname=".DBNAME,DBUSER, DBPWD);
        }catch (\Exception $e){
            die("Erreur SQL : ".$e->getMessage());
        }
    }
    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance=new Crud();
        }
        return self::$instance;
    }


    public function display(){
        $req =  $this->builder-> select(DBPREFIXE.'user', ["id","email","firstname","lastname","role_id"])
        ->getQuery();
        $queryPrepared = $this->pdo->prepare($req);
        $queryPrepared->execute();
        return $queryPrepared->fetchAll();
    }
    public function update($infos){

        $req = $this->builder-> update(DBPREFIXE.'user', $infos)
        ->where("id",$infos['id'],"=")
        ->getQuery();
        // var_dump($req);

        $queryPrepared = $this->pdo->prepare($req);
        $queryPrepared->execute();
        //var_dump($queryPrepared);
        //return "done";
    }

    public function tokenReturn(string $table , int $id){
        $table=DBPREFIXE.$table;
        $req =  $this->builder-> select($table, ['token'])
        -> where("id", $id)
        -> getQuery();
        $reqPrep = $this->pdo->prepare($req);
        $reqPrep -> execute();
        return $reqPrep->fetchAll();

    }
    
    public function addUser(){
        $columns = get_object_vars($this);
        $columns = array_diff_key($columns, get_class_vars(get_class()));

        $table=DBPREFIXE.'user';
        
        // var_dump($table);
        
            $sql =  $this->builder-> insert($table, $columns);
            // var_dump($sql);
    }
    public function getArticles(){
        $req =  $this->builder-> select('waterlily_articlee', ["idArticle","title","content","idCategory","idPage"])
        ->getQuery();
        $queryPrepared = $this->pdo->prepare($req);
        $queryPrepared->execute();
        return $queryPrepared->fetchAll();
    }

}
?> 