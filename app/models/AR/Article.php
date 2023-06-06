<?php

namespace App\Models\AR;
use Illuminate\Database\Eloquent\Model;

class Article extends Model{
    
    protected $id;
    protected $date;
    protected $title;
    protected $text;
    protected $img;
    protected $fillable = ["date", "title", "text", "img"];


    function __construct( $array = null){
        // die(json_encode($array));
        if (isset($array["date"])) $this["date"] = $array["date"];
        $this["title"] = $array["title"] ?? "";
        $this["text"] = $array["text"] ?? "";
        $this["img"] = $array["img"] ?? null;
        $this["video"] = $array["video"] ?? null;
    }

    static function writeArticle($array){
        // (isset($array["date"])) ? $date = $array["date"] : $date = date();
        // $article = new Article(["date" => $date, "title" => $array["title"], "text" => $array["text"], "img" => ($array["img"] ?? null)]);
        $article = new Article($array);
        // $article["text"] = $array["text"];
        // $article["date"] = $date;
        // $article["title"] = $array["title"];
        // $article["img"] = $array["img"] ?? null;
        // die(json_encode($article));
        $article->save();
        // die("all");
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
