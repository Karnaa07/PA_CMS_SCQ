<?php 
namespace App\Core;
use App\Core\MysqlBuilder;


class Crud
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
        $req =  $this->builder-> select('waterlily_user', ["id","email","firstname","lastname","role_id"])
        ->getQuery();
        $queryPrepared = $this->pdo->prepare($req);
        $queryPrepared->execute();
        return $queryPrepared->fetchAll();
    }
    public function updateUser($infos){

        $req = $this->builder-> update('waterlily_user', $infos)
        ->where("id",$infos['id'],"=")
        ->getQuery();
        // var_dump($req);

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
    public function addUser(){
        $columns = get_object_vars($this);
        $columns = array_diff_key($columns, get_class_vars(get_class()));

        $table=DBPREFIXE.'user';
        
        // var_dump($table);
        
            $sql =  $this->builder-> insert($table, $columns);
            // var_dump($sql);

    }

}
?>