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
            $this->pdo = new \PDO( DBDRIVER.":host=".DBHOST.";port=".DBPORT.";dbname=".DBNAME
                ,DBUSER, DBPWD , [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING]);
        }catch (\Exception $e){
            die("Erreur SQL : ".$e->getMessage());
        }

        //Si l'id n'est pas null alors on fait un update sinon on fait un insert
        $calledClassExploded = explode("\\",get_called_class());
        $this->table = strtolower(DBPREFIXE.end($calledClassExploded));

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
        $queryPrepared->execute(array($email)); // On les éxécutes avec nos données
        $result = $queryPrepared->fetch();

        if (password_verify($password,$result["password"])){
            setcookie(token,$result["token"],time()+3600);
            return $result; 
        }

    }
}
