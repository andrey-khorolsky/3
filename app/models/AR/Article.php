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


    static function writeArticle($array){
        $date = $array["date"] ?? date("y.m.d G:i:s");
        $article = new Article(["date" => $date, "title" => $array["title"], "text" => $array["text"], "img" => ($array["img"] ?? null)]);
        $article->save();
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
