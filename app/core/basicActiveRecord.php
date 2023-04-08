<?php

class BasicActiveRecord{

    private static $database = "web-my-site";
    protected static $table;
    public static $pdo;
    private $id;

    function __construct(){
        $this->createConnect();
    }

    static function createConnect(){
        try{
        static::$pdo = new PDO("mysql:host=localhost; dbname=web-my-site", "root", "123");
        } catch (PDOException $e){
            echo "troubles with dpo connection - ".$e;
        }
    }


    function save(){


    }

    function delete(){
        static::$pdo->query("DELETE FROM `".static::$table."` WHERE id = ".$this->id);

    }

    static function find($id){
        static::createConnect();
        $res = static::$pdo->query("SELECT * FROM `".static::$table."` WHERE id = $id");
        $res = $res->fetch();

        if (!$res) return null;

        $obj = new static();
        foreach ($res as $key => $value) {
            $obj ->$key = $value;
        }
        return $obj;

    }

    static function FindAll(){
        static::createConnect();
        
        $objs = [];
        
        try{
            // echo static::$table." - ";
            $res = static::$pdo->query("SELECT * FROM `".static::$table."`");

            while ($val = $res->fetch()){
                $obj = new static();
                foreach ($val as $key=>$value)
                    $obj->$key = $value;
                $objs[] = $obj;
            }

        } catch (PDOException $ex){
            echo "trouble ".$ex." end\n";
        }
       
        return $objs;

    }

}
