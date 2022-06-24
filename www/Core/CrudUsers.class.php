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
        $req =  $this->builder-> select('esgi_user', ["id","email","firstname","lastname"])
        ->getQuery();
        $queryPrepared = $this->pdo->prepare($req);
        $queryPrepared->execute();
        return $queryPrepared->fetchAll();
    }
    public function updateUser($infos){

        $req = $this->builder-> update('esgi_user', $infos)
        ->where("id",$infos['id'],"=")
        ->getQuery();


        $queryPrepared = $this->pdo->prepare($req);
        $queryPrepared->execute();
        //var_dump($queryPrepared);
        //return "done";
    }
    public function addUser(){
        $columns = get_object_vars($this);
        $columns = array_diff_key($columns, get_class_vars(get_class()));

        $table=DBPREFIXE.'user';
        
        var_dump($table);
        
            $sql =  $this->builder-> insert($table, $columns);
            var_dump($sql);

    }

}
?>