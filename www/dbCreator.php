<?php
    namespace App;
    use App\Core\Crud as CrudUser;
    

    if(isset($_POST))
    {



        $sql = file_get_contents('waterlily.sql');
    
        $qr = $dbh->exec($sql);

        $fp = fopen('conf.inc.php', 'w');
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

        require "conf.inc.php";
        $user = new CrudUser();

    }
?>