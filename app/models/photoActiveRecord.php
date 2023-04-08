<?php

include("app/core/basicActiveRecord.php");

class Photo extends BasicActiveRecord{

    protected static $table = "carPhotos";
    public $id;
    public $photo;
    public $title;

    static function FindAll(){
        static::createConnect();
        
        $objs = [];
        
        try{
            $f = fopen("findAllLog.txt", 'a');
            $st = microtime(true);

            $res = static::$pdo->query("SELECT * FROM `".static::$table."`");

            while ($val = $res->fetch(PDO::FETCH_ASSOC)){

                fwrite($f, "before new - ".microtime(true)-$st);

                $obj = new self();

                fwrite($f, "after new - ".microtime(true)-$st);

                foreach ($val as $key=>$value)
                    $obj->$key = $value;
                $objs[] = $obj;
            }
            fclose($f);

        } catch (PDOException $ex){
            echo "trouble ".$ex." end\n";
        }
       
        return $objs;

    }

}