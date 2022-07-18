<?php
namespace App\Core;
use App\Core\MysqlBuilder;
abstract class CrudAbstract{
    public function deleteRow(string $table, string $column, string $id){
        $tableBD=DBPREFIXE.$table;
        $req = $this->builder-> delete($tableBD)
        ->where($column,$id,"=")
        ->getQuery();
        $queryPrepared = $this->pdo->query($req);
        //var_dump($req);
    }
    public function display(){}
    public function update($infos){}
}