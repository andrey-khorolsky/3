<?php

class BasicActiveRecord{

    private static $database;
    public static $pdo;
    private $fields = [];

    function __construct(){
        $this->createConnect();
    }

    function createConnect(){
        try{
        static::$pdo = new PDO("mysql:host=localhost; dbname=web-my-site", "root", "123");
        } catch (PDOException $e){
            echo "troubles with dpo connection - ".$e;
        }
    }


    function save(){

    }

    function delete(){

    }

    function find($id){

    }

    function FindAll(){

    }

}
