<?php

namespace App\Models;
use App\Http\Requests\BlogRequest;
use App\Models\AR\Article;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Translation\Dumper\CsvFileDumper;

class Blog_model{

    private $articles;



    function getArticles($count){
        return Article::paginate($count);
    }

    function newArticle(BlogRequest $blogRequest){
        $blogRequest["img"] = $_FILES["file"]["name"] ? "img/blog/".$_FILES["file"]["name"] : null;
        Article::writeArticle($blogRequest);
        // (new Article($blogRequest))->save();
        move_uploaded_file($_FILES["file"]["tmp_name"], "img/blog/".$_FILES["file"]["name"]);
    }

    function getPagesCount(){
        return Article::all()->count();
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
            // die(json_encode($arr));

            Article::writeArticle($arr);
            // (new Article($arr))->save();
        }
    }

    static function saveBlogInFile(){
        $file = "blog.csv";
        $openedFile = fopen($file, 'w');

        $articles = Article::all();
        foreach($articles as $article){
            
            fwrite($openedFile, "\"".($article->title ?? "")."\",\"".($article->text ?? "")."\",\"".($article->author ?? "")."\",\"".($article->date ?? "")."\"\n");
        }

        fclose($openedFile);
        return url($file);
    }
}
