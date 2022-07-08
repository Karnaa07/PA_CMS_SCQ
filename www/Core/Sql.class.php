<?php

namespace App\Core;

use App\Core\MysqlBuilder;

abstract class Sql
{
    private $pdo;
    private $table;
    private $builder;
    
    public function __construct() // Constructeur qui connect à la BDD à la création d'un objet de la classe SQL
    {
        //Se connecter à la bdd
        //il faudra mettre en place le singleton
        try{
            $this->pdo = new \PDO( DBDRIVER.":host=".DBHOST.";port=".DBPORT.";dbname=".DBNAME,DBUSER, DBPWD);
        }catch (\Exception $e){
            die("Erreur SQL : ".$e->getMessage());
        }
        $this->builder =new MysqlBuilder();
    }
    /**
     * @param int $id
     */


    public function setId(?int $id): object // Return les données d'un utilisateur
    {
        $sql =  $this->builder-> select($this->table, ["*"])
        -> where("id",$id);
        $query = $this->pdo->query($sql);
        return $query->fetchObject(get_called_class()); 
    }
    public function save($table) // Enregistrement en BDD de valeurs provenants de formulaires
    {
        $columns = get_object_vars($this);
        $columns = array_diff_key($columns, get_class_vars(get_class()));

        $table=DBPREFIXE.$table;
        $values=array_keys($columns);
        var_dump('toto');
        var_dump($this->getId());
        if($this->getId() == null){
            
            $sql =  $this->builder-> insert($table, $columns)->getQuery();
           
            
        } else { 
            // $update = [];
            // foreach ($columns as $column=>$value)
            // {
            //     $update[] = $column."=:".$column;
            // }
            // $sql = "UPDATE ".$this->table." SET ".implode(",",$update)." WHERE id=".$this->getId() ;
            $sql =  $this->builder-> update($this->table, $columns)
            -> where("id",$this->getId())
            ->getQuery();
            //var_dump($sql);
         
        }
       
        $queryPrepared = $this->pdo->prepare($sql); // On prépare nos requêtes
        var_dump($columns);
        if($table==DBPREFIXE.'user'){
            $queryPrepared->execute([
                $columns['id'],
                $columns['firstname'],
                $columns['lastname'],
                $columns['email'],
                $columns['password'],
                $columns['status'],
                $columns['token']
    
            ]);
        }
        else{
            //var_dump($columns);
            $queryPrepared->execute($columns);
        }
 // On les éxécutes avec nos données
       // var_dump($queryPrepared);

    }
    public function exist_user($table,$email,$password)
    {
        $table=DBPREFIXE.$table;
        $req =  $this->builder-> select($table, ["*"])
        -> join("waterlily_roles","role_id")
        -> where("email", $email)
        -> getQuery();

        $queryPrepared = $this->pdo->query($req);
        $result = $queryPrepared->fetch();
        //var_dump($result);

        if (password_verify($password,$result["password"])){
            
            $_SESSION["user"]["permissions"] = [];
            return $result; 
        }
    }

    public function Crud(){
        $queryPrepared =$this->pdo->prepare("SELECT email,firstname,lastname FROM `waterlily_user`");
        $queryPrepared->execute();
        return $queryPrepared->fetchAll();
    }

    public function getOneBy(string $table, ?array $where=null) : ?array 
    {
        $table=DBPREFIXE.$table;
        $sql= "SELECT * FROM ".$table;
        if (!is_null($where)){
            foreach ($where as $column=>$value)
            {
                $select[] = $column."=:".$column;
            }
            $sql.=" WHERE ".implode(" AND ", $select);
        }
        
        $prepare=$this->pdo->prepare($sql);
        $prepare->execute($where);
        $result=$prepare->fetch();
        if(gettype($result)!=="array"){
            $result=null;
            
        }
        return $result;

    }
    public function getUserPerms(string $permsId) : ?array 
    {
        $req =  $this->builder-> select('waterlily_roles_permissions', ["*"])
        -> where("role_id", $permsId)
        -> getQuery();
        $reqPrep = $this->pdo->prepare($req);
        $reqPrep -> execute();
        return $reqPrep->fetchAll();
    }

}
