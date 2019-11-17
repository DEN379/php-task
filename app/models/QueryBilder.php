<?php

namespace App\models;
use PDO;

class QueryBilder{

    public $pdo;

    function __construct(){
        $this->pdo = new PDO("mysql:host=test;dbname=tasks","root","");
    }

    function show($table){
        $sql="SELECT * FROM $table";
        $ex=$this->pdo->prepare($sql);
        $result=$ex->execute();
        $tasks=$ex->fetchAll(PDO::FETCH_ASSOC);
        
        return $tasks;
    }

    function delete($table,$id){
        $sql="DELETE FROM $table WHERE id=:id";
        $ex=$this->pdo->prepare($sql);
        $ex->bindParam("id",$id);
        $ex->execute();
    }

    function showOne($table,$id){
        $sql="SELECT * FROM $table WHERE id=:id";
        $ex=$this->pdo->prepare($sql);
        $ex->bindParam("id",$id);
        $ex->execute();
        $task=$ex->fetch(PDO::FETCH_ASSOC);

        return $task;
    }

    function update($table,$data){
        $field="";
        foreach ($data as $key => $value) {
            $field.=$key."=:".$key.",";
        }
        $field=rtrim($field,","); 
        
        $sql="UPDATE $table SET $field WHERE id=:id";
        $ex=$this->pdo->prepare($sql);
        $ex->execute($data);
    }

    function store($table,$data){
        $keys=array_keys($data);
        $split=implode(",",$keys);
        $values=":".implode(",:",$keys);

        $sql="INSERT INTO $table ($split) VALUES ($values)";
        $ex=$this->pdo->prepare($sql);
        $ex->execute($data);
    }
}