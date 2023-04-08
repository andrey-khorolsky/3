<?php

require_once("app/core/basicActiveRecord.php");

class Photo extends BasicActiveRecord{

    protected static $table = "carPhotos";
    public $id;
    public $photo;
    public $title;

}