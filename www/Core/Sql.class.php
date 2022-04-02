<?php

namespace App\Core;

abstract class Sql
{
    private $pdo;
    private $table;

    public function __construct() // Constructeur qui connect à la BDD à la création d'un objet de la classe SQL
    {
        //Se connecter à la bdd
        //il faudra mettre en place le singleton
        try{
            $this->pdo = new \PDO( DBDRIVER.":host=".DBHOST.";port=".DBPORT.";dbname=".DBNAME,DBUSER, DBPWD);
        }catch (\Exception $e){
            die("Erreur SQL : ".$e->getMessage());
        }
    }
    /**
     * @param int $id
     */
    public function setId(?int $id): object // Return les données d'un utilisateur
    {
        $sql = "SELECT * FROM ".$this->table." WHERE id=".$id;
        $query = $this->pdo->query($sql);
        return $query->fetchObject(get_called_class()); 
    }

    public function save() // Enregistrement en BDD de valeurs provenants de formulaires
    {

        $columns = get_object_vars($this);
        $columns = array_diff_key($columns, get_class_vars(get_class()));

        if($this->getId() == null){
            $sql = "INSERT INTO ".$this->table." (".implode(",",array_keys($columns)).") 
            VALUES ( :".implode(",:",array_keys($columns)).")";
        }else{ 
            $update = [];
            foreach ($columns as $column=>$value)
            {
                $update[] = $column."=:".$column;
            }
            $sql = "UPDATE ".$this->table." SET ".implode(",",$update)." WHERE id=".$this->getId() ;
        }

        $queryPrepared = $this->pdo->prepare($sql); // On prépare nos requêtes
        $queryPrepared->execute( $columns ); // On les éxécutes avec nos données

    }
    public function exist_user($email,$password)
    {
        $req = "SELECT * FROM esgi_user WHERE email = ?";
        $queryPrepared = $this->pdo->prepare($req);
        $queryPrepared->execute(array($email));
        $result = $queryPrepared->fetch();
        if (password_verify($password,$result["password"])){
            return $result; 
        }
    }
    public function Crud(){
        $queryPrepared =$this->pdo->prepare("SELECT email,firstname,lastname FROM `esgi_user`");
        $queryPrepared->execute();
        return $queryPrepared->fetchAll();
    }
}
