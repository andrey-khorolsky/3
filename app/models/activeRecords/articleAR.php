<?php

require_once("app/core/basicActiveRecord.php");

class Article extends BasicActiveRecord{
    
    protected static $table = "articles";
    protected $id;
    protected $date;
    protected $title;
    protected $text;
    protected $img;

    static function getArticles($from, $count){
        static::createConnect();
        
        $stmt = static::$pdo->prepare("SELECT * FROM `articles` ORDER BY `date` DESC LIMIT ".$from.", ".$count);

        $stmt->execute();

        return static::createFromData($stmt);
    }

    static function writeArticle($array){
        static::createConnect();

        $stmt = static::$pdo->prepare("INSERT INTO `articles` (`id`, `date`, `title`, `text`, `img`) VALUES (NULL, :date, :title, :text, :img)");

        $date = $array["date"] ?? date("y.m.d G:i:s");
        $stmt->bindParam("date", $date);
        $stmt->bindParam("title", $array["title"]);
        $stmt->bindParam("text", $array["text"]);
        $stmt->bindParam("img", $array["img"]);

        $stmt->execute();
    }


    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the value of text
     */ 
    public function getText()
    {
        return $this->text;
    }

    /**
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->img;
    }
}
