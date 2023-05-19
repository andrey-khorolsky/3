<?php

namespace App\Models;
use App\Http\Requests\BlogRequest;
use Illuminate\Database\Eloquent\Model;
use App\Models\AR\Article;
use Illuminate\Support\Facades\Validator;

class Blog_model extends Model{

    private $articles;



    function getArticles($from, $count){
        $this->articles = Article::pagination();
        return $this->articles;
    }

    function newArticle($array, BlogRequest $blogRequest){
        $array["img"] = $_FILES["file"]["name"] ? "img/blog/".$_FILES["file"]["name"] : null;
        Article::writeArticle($array);
        move_uploaded_file($_FILES["file"]["tmp_name"], "img/blog/".$_FILES["file"]["name"]);
    }

    function getPagesCount(){
        return count(Article::all());
    }

    function addArticlesFromFile($file){

        $openedFile = fopen($file, "r");
        while($str = fgetcsv($openedFile)){
            $arr = [
                "date" => $str["3"],
                "title" => $str["0"],
                "text" => $str["1"],
                "author" => $str["2"]
            ];
            
            $validator = Validator::make($arr, [
                'date' => 'required',
                'title' => 'required',
                'text' => 'required',
                'author' => 'required',
            ]);
    
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            Article::writeArticle($arr);
        }
    }
}
