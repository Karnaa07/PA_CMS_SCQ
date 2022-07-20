<?php 
namespace App\Core;

class Installateur 
{
    public function __construct()
    {
        try{
            $this->pdo = new \PDO( "mysql".":host=".$_POST['dbHost'].";port=".$_POST['dbPort'].";dbname=".$_POST['dbName'],$_POST['dbUserName'],  $_POST['dbPwd']);
        } catch (\Exception $e) {
            // var_dump($_POST);
            die();
        }
    }
    public function SetUpSQL(){
        $sql = file_get_contents('waterlily.sql');
        $qr = $this->pdo->exec($sql);
        return true;
    }
    public function setConfFile()
    {
        $fp = fopen('conf.inc.php', 'w');
        var_dump($fp);
        if(isset($_POST)){
            // var_dump("toto");
            $conf = '<?php define("DBHOST", "'.$_POST['dbHost'].'");
                define("DBUSER", "'.$_POST['dbUserName'].'");
                define("DBPWD", "'.$_POST['dbPwd'].'");
                define("DBNAME", "'.$_POST['dbName'].'");
                define("DBPORT", "3306");
                define("DBDRIVER", "mysql");
                define("DBPREFIXE", "'.$_POST['dbPrefix'].'");
                define("SITENAME", "'.$_POST['siteName'].'"); ';
            fwrite($fp, $conf);
            fclose($fp);
            sleep(15);
            return true;
        }
    }
    public function setAdmin()
    {
        $insertProbleme=$this->pdo->prepare("INSERT INTO ".$_POST['dbPrefixe']."user (id, email, password, firstname, lastname, contry, role_id, status, token, createdAt, updatedAt) Values (:commentaire, :urlProbleme, :codeAffaire, :idCategorie, :dateProbleme, :reparation)");
        $insertProbleme -> execute ([
            'commentaire'=>$contenu,

        
        ]);
    }
    public function delInstaller(){
        unlink('setup.php');
    }
}
?> 