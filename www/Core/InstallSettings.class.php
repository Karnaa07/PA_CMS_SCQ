
<? 
namespace App\Core;
use App\Core\MysqlBuilder;


class InstallSettings 
{
    public function __construct()
    {
        $this->builder = new MysqlBuilder();
        try{
            $this->pdo = new \PDO( "mysql".":host=".$_POST['dbHost'].";port=".$_POST['dbPort'].";dbname=".$_POST['dbName'],$_POST['dbUserName'],  $_POST['dbPwd']);
        } catch (\Exception $e) {
            var_dump($e);
            die();

        }
    }
    public function SetUpSQL(){
        var_dump('la');
        die;
        $sql = file_get_contents('waterlily.sql');
        var_dump('pop');
        $qr = $this->pdo->exec($sql);
        return true;
    }
    public function setConfFile(){
        // var_dump('toto');
        die;
        $fp = fopen('../conf.inc.php', 'w');
        if(isset($_post)){
            var_dump('aaazzzz');
            $conf='etst';
            // $conf = '<?php define("DBHOST", "'.$_POST['dbHost'].'");
            //     define("DBUSER", "'.$_POST['dbUserName'].'");
            //     define("DBPWD", "'.$_POST['dbPwd'].'");
            //     define("DBNAME", "'.$_POST['dbName'].'");
            //     define("DBPORT", "3306");
            //     define("DBDRIVER", "mysql");
            //     define("DBPREFIXE", "'.$_POST['dbPrefix'].'");
            //     define("SITENAME", "'.$_POST['siteName'].'"); ';
            fwrite($fp, $conf);
            die;
        }
    }
    public function delInstaller(){
        unlink('../setup.php');
    }
}
?> 