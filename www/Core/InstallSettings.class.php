
<? 
namespace App\Core;
use App\Core\MysqlBuilder;


class InstallSettings 
{
    public function SetUpSQL(){
        try {
            $dbh = new PDO('mysql:host='.$_POST['dbHost'].';dbname='.$_POST['dbName'].'', $_POST['dbUserName'], $_POST['dbPwd']);
        } catch (PDOException $e) {
            header("Location: /");
            exit;
        }
        $sql = file_get_contents('waterlily.sql');
        $qr = $dbh->exec($sql);
        return true;
    }
    public function getArticles(){

        $fp = fopen('../conf.inc.php', 'w');
        $conf = '<?php
            define("DBHOST", "'.$_POST['dbHost'].'");
            define("DBUSER", "'.$_POST['dbUserName'].'");
            define("DBPWD", "'.$_POST['dbPwd'].'");
            define("DBNAME", "'.$_POST['dbName'].'");
            define("DBPORT", "3306");
            define("DBDRIVER", "mysql");
            define("DBPREFIXE", "'.$_POST['dbPrefix'].'");
            define("SITENAME", "'.$_POST['siteName'].'"); ';
        fwrite($fp, $conf);
    }
    public function delInstaller(){
        unlink('../setup.php');
    }
}
?> 