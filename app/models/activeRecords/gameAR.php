<?php

class Game extends BasicActiveRecord{

    protected static $table = "hobby_game";
    public $id;
    public $title;
    public $type;
    public $cover;
    public $disc;
    
}
