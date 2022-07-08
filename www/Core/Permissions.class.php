<?php
namespace App\Core;
use App\Core\MysqlBuilder;

class Permissions 
{
    public function cando(int $neededPerm) :bool 
    { 
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        return in_array($neededPerm, $_SESSION["user"]["permissions"]);
    }
}
?>