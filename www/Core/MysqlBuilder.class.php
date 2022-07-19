<?php
namespace App\Core;

use App\Core\QueryBuilder;

class MysqlBuilder implements QueryBuilder {
    private $query;
    private function reset(){
        $this->query = new \stdClass;
    }
    public function select(string $table,array $columns):QueryBuilder
    {
        $this->reset();
        $this->query->base="SELECT ". implode(', ',$columns)." FROM ".$table." ";
        return $this;
    }
    public function insert(string $table,array $values):QueryBuilder
    {
        $this->reset();
       if($table==DBPREFIXE.'page'){
        $this->query->base="INSERT INTO ".$table." (name) VALUES ('".$values['name']."')";
       }
       else if($table==DBPREFIXE.'articlee') {
            $strout='';
            foreach ($values as $key => $value) {
                if($value!=null){
                    $strout =$strout."'".$value."',";
                } else {
                    $strout =$strout.$value.",";

                }
            }
            if(strlen($strout) > 1){
                var_dump($strout);
                $strout = substr($strout, 0, -1);
                $this->query->base="INSERT INTO ".$table.' (idArticle,title,content,urlimage,idCategory,idPage) VALUES (null  '.
                $strout.')';
            }
        }
       else{
        $this->query->base="INSERT INTO ".$table." VALUES ( null ".implode(", ",$values).")";
       }

        return $this;
    }
    public function update(string $table, array $datas):QueryBuilder
    {
        $this->reset();
        $strout = '' ;
        foreach ($datas as $key => $value) {
            $strout =$strout.$key."="."'".$value."'".",";
        }
        if(strlen($strout) > 1){
            $strout = substr($strout, 0, -1);
            //var_dump($strout);
            $this->query->base="UPDATE ".$table." SET ".$strout;
        }
        else {
            var_dump('test');
        }
            return $this;
    }


    public function delete(string $table):QueryBuilder
    {
        $this->reset();
        $this->query->base="DELETE FROM ".$table;
        return $this;

    }

    public function where(string $column, string $value , string $operator="=",bool $functionSQL = false):QueryBuilder
    {
        $functionSQL ? $this->query->where[]=$column.$operator.$value : $this->query->where[]=$column.$operator."'".$value."'" ;
        return $this;
    }
    public function limit(int $from,int $offset):QueryBuilder
    {
        $this->query->limit=" LIMIT ".$from.", ".$offset;
        return $this;
    }

    public function group(string $column):QueryBuilder
    {
        $this->query->group="GROUP BY ".$column."";
        return $this;
    }
    public function join(string $table,string $id):QueryBuilder
    {
        $this->query->join="JOIN ".$table." USING(".$id.")";
        return $this;
    }


    public function getQuery(): string
    {
        $query = $this->query;
        $sql = $query->base;
        if(!empty($query->where)){
            $sql .= ' WHERE '.implode(' AND ', $query->where);
        }
        if(isset($query->limit)){
            $sql .= $query->limit;
        }
        if(isset($query->group)){
            $sql .= $query->group;
        }
        $sql .= ';';
        return $sql;
    }
    
}
?>