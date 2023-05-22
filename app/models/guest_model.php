<?php

namespace App\Models;

class Guest_model{

    private $file = "messages.inc";
    private $openFile;
    private $validator;

    private $comments;

    function openFileForRead(){
        $this->openFile = fopen($this->file, 'r');
    }

    function openFileForWrite(){
        $this->openFile = fopen($this->file, "r+");
        fseek($this->openFile, filesize($this->file));
    }

    function closeFile(){
        fclose($this->openFile);
    }

    function getComments($start = 0, $countComments = 20){
        $this->openFileForRead();

        for ($i=0; $i<$start; $i++)
            fgets($this->openFile);
        
        $this->comments = null;

        for ($i=0; $i<$countComments; $i++){
            if (!feof($this->openFile))
                $this->comments[] = $this->findComment();
            else break;
        }
        
        $this->closeFile();
        
    }

    function findComment(){
        
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
        $fil = fopen($files["messages"]["tmp_name"], "r");
        $this->openFileForWrite();

        while($str = fgets($fil)){
            fwrite($this->openFile, "\n".$str);
        }
        fclose($fil);
        $this->closeFile();
    }

    function getAllComments(){
        $this->getComments();
        return $this->comments;
    }
}
