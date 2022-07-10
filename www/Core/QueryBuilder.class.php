<?php
namespace App\Core;

interface QueryBuilder{
    public function select(string $table, array $columns) : QueryBuilder;
    public function insert(string $table, array $values) : QueryBuilder;
    public function update(string $table, array $datas):QueryBuilder;
    public function where(string $column, string $value, string $operator = '=') : QueryBuilder;
    public function limit(int $from,int $offset):QueryBuilder;
    public function join(string $table,string $id):QueryBuilder;
    public function delete(string $table):QueryBuilder;
    public function getQuery(): string;
}


?>