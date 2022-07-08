<?php
namespace App\Core;
use App\Core\MysqlBuilder;

class Permissions 
{
    public function cando(int $neededPerm) :bool 
    { 
        session_start();
        //var_dump($_SESSION["user"]["permissions"]);
        //var_dump(in_array($neededPerm, $_SESSION["user"]["permissions"]));
        return in_array($neededPerm, $_SESSION["user"]["permissions"]);
    }
}
?>