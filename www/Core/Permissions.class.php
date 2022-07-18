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
        if(isset($_SESSION["user"]["permissions"])){
            return in_array($neededPerm, $_SESSION["user"]["permissions"]);
        } 
        else{
            return false;
        } 
    }
}
?>