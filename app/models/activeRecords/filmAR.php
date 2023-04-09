<?php

class Film extends BasicActiveRecord{

    protected static $table = "hobby_film";
    public $id;
    public $title;
    public $type;
    public $cover;
    public $disc;
    
}
