<?php

class Book extends BasicActiveRecord{

    protected static $table = "hobby_book";
    public $id;
    public $title;
    public $artist;
    public $cover;
    public $disc;
    
}
