<?php

class BasicActiveRecord{

    private $database;

    function __construct($database){
        $this->database = $database;
    }
}
