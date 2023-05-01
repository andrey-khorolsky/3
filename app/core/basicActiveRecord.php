<?php

class BasicActiveRecord{

    private static $database = "web-my-site";
    protected static $table;
    public static $pdo;
    private $id;

    function __construct(){
        if (!static::$pdo)
            $this->createConnect();
    }

    static function createConnect(){
        if (!static::$pdo)
            try{
                static::$pdo = new PDO("mysql:host=localhost; dbname=web-my-site", "root", "123");
            } catch (PDOException $e){
                echo "troubles with dpo connection - ".$e;
            }
    }


    function save(){

        // foreach ($this as $key=>$val)
        //     static::$pdo->query("INSERT INTO `".$this->table."` (`photo`, `title`) VALUES ('".$this."', '".$this-."');");

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
            $obj->$key = $value;
        }
        return $obj;

    }

    static function FindAll(){
        $f = fopen("findAllLog.txt", 'a');
        $st = microtime(true);

        static::createConnect();

        fwrite($f, "\nconnect - ".microtime(true)-$st."\n");
        $st = microtime(true);
        
        $objs = [];
        
        try{

            $res = static::$pdo->query("SELECT * FROM `".static::$table."`");

            while ($val = $res->fetch(PDO::FETCH_ASSOC)){

                $obj = new static();

                foreach ($val as $key=>$value)
                    $obj->$key = $value;

                $objs[] = $obj;
            }
            fwrite($f, "arr created - ".microtime(true)-$st);
            fclose($f);

        } catch (PDOException $ex){
            echo "trouble ".$ex." end\n";
        }
       
        return $objs;

    }

}
