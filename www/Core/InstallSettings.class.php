
<? 
namespace App\Core;
use App\Core\MysqlBuilder;


class InstallSettings 
{
    public function SetUpSQL(){
        try {
            $dbh = new PDO('mysql:host='.$_POST['dbHost'].';dbname='.$_POST['dbName'].'', $_POST['dbUserName'], $_POST['dbPwd']);
        } catch (PDOException $e) {
            var_dump($e);
            die();
            //header("Location: /");
            //exit;
        }
        $sql = file_get_contents('waterlily.sql');
        $qr = $dbh->exec($sql);
        return true;
    }
    public function setConfFile(){

        $fp = fopen('../conf.inc.php', 'w');
        echo('<script> alert('.$_POST.') </script>');
        echo('test');
        if(isset($_post)){
            $conf = '<?php define("DBHOST", "'.$_POST['dbHost'].'");
                define("DBUSER", "'.$_POST['dbUserName'].'");
                define("DBPWD", "'.$_POST['dbPwd'].'");
                define("DBNAME", "'.$_POST['dbName'].'");
                define("DBPORT", "3306");
                define("DBDRIVER", "mysql");
                define("DBPREFIXE", "'.$_POST['dbPrefix'].'");
                define("SITENAME", "'.$_POST['siteName'].'"); ';
            fwrite($fp, $conf);
        }
    }
    public function delInstaller(){
        unlink('../setup.php');
    }
}
?> 