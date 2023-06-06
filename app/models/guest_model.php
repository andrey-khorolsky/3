<?php

namespace App\Models;

class Guest_model{

    private static $file = "messages.inc";
    private $openFile;
    private $validator;

    private $comments;



    private function openFileForRead(){
        $this->openFile = fopen(static::$file, 'r');
    }


    private function openFileForWrite(){
        $this->openFile = fopen(static::$file, "r+");
        fseek($this->openFile, filesize(static::$file));
    }


    private function closeFile(){
        fclose($this->openFile);
    }


    //считывание countComments комментариев
    private function getComments($start = 0, $countComments = 20){
        $this->openFileForRead();

        for ($i=0; $i<$start; $i++)
            fgets($this->openFile);
        
        unset($this->comments);

        for ($i=0; $i<$countComments; $i++){
            if (!feof($this->openFile))
                $this->comments[] = $this->findComment();
            else break;
        }
        
        $this->closeFile();
    }


    //создание комментария из строки
    private function findComment(){
        if ($str = fgets($this->openFile)){
            $str = explode(";", $str);
            $res["date"] = $str["0"];
            $res["fio"] = $str["1"];
            $res["email"] = $str["2"];
            $res["text"] = $str["3"];
            return $res;
        }
        return;
    }


    //написание комментария (создание из массива)
    function writeComment($array){
        if (is_null($array) || !isset($array)) return;

        $this->openFileForWrite();
        fwrite($this->openFile, "\n".date('d.m.y').";");
        fwrite($this->openFile, str_replace(";", "", $array["fio"]).";");
        fwrite($this->openFile, str_replace(";", "", $array["email"]).";");
        fwrite($this->openFile, str_replace(";", "", $array["text"]).";");
        $this->closeFile();
    }


    function uploadFromFile($files){
        move_uploaded_file($_FILES["messages"]["tmp_name"], public_path()."/messages.inc");
    }


    function getAllComments(){
        $this->getComments();
        return $this->comments;
    }


    static function saveGuestInFile(){
        return url(static::$file);
    }

}
