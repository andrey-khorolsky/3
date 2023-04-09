<?php

include("app/core/basicActiveRecord.php");

class Photo extends BasicActiveRecord{

    protected static $table = "carPhotos";
    public $id;
    public $photo;
    public $title;

}