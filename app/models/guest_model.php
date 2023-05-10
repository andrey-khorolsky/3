<?php

class Guest_model{

    private $file = "public/assets/messages.inc";
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

    function getComments($start = 0, $countComments = 10){
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
        fwrite($this->openFile, $array["fio"].";");
        fwrite($this->openFile, $array["email"].";");
        fwrite($this->openFile, $array["text"].";");
        $this->closeFile();
    }

    function getAllComments(){
        $this->getComments();
        return $this->comments;
    }

    function validate($array){
        require_once("app/models/validators/formValidator.php");
        $this->validator = new FormValidator();

        $this->validator->setRule("fio", "isNotEmpty");
        $this->validator->setRule("email", "isNotEmpty");
        $this->validator->setRule("text", "isNotEmpty");

        $this->validator->setRule("email", "isEmail");

        return $this->validator->validate($array);
    }
}

//переделать для ооп - добавить класс для сообщений
