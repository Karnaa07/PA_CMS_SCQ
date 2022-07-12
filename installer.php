<?php
    $sql = require('./www/Core/Sql.class.php');
    if(isset($_POST))
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $dbh = new PDO('mysql:host='.$_POST['dbHost'].';dbname='.$_POST['dbName'].'', $_POST['dbUserName'], $_POST['dbPwd']);

        $sql = file_get_contents('waterlily.sql');
    
        $qr = $dbh->exec($sql);


        header('Location: createSuperAdmin.php');
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
    }
?>