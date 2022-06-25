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
        $this->query->base="INSERT INTO ".$table." VALUES (".implode(", ",$values).")";
        return $this;
    }
    public function update(string $table, array $datas):QueryBuilder
    {
        $strout = '' ;
        $this->reset();
        foreach ($datas as $key => $value) {
            $strout =$strout.$key."="."'".$value."'".",";
        }
        if(strlen($strout) > 1){
            $strout = substr($strout, 0, -1);
            //var_dump($strout);
            $this->query->base="UPDATE ".$table." SET ".$strout;
        }
        else{
            var_dump('test');
        }
                return $this;
    }

    public function where(string $column, string $value, string $operator="="):QueryBuilder
    {
        $this->query->where[]=$column.$operator."'".$value."'";
        return $this;
    }

    public function limit(int $from,int $offset):QueryBuilder
    {
        $this->query->limit=" LIMIT ".$from.", ".$offset;
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
        
        $sql .= ';';
        return $sql;
    }
    
}
?>