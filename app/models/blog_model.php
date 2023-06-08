<?php

namespace App\Models;
use App\Http\Requests\BlogRequest;
use App\Models\AR\Article;
use App\Models\AR\ArticlesComment;
use Exception;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Translation\Dumper\CsvFileDumper;

class Blog_model{

    private $articles;



    function getArticles($count){
        return Article::paginate($count);
    }

    function newArticle(BlogRequest $blogRequest){
        if (is_null($blogRequest["video"]) && !is_null($_FILES["file"]["name"]))
            $blogRequest["img"] = $_FILES["file"]["name"] ? "img/blog/".$_FILES["file"]["name"] : null;
        Article::writeArticle($blogRequest);
        // (new Article($blogRequest))->save();
        move_uploaded_file($_FILES["file"]["tmp_name"], "img/blog/".$_FILES["file"]["name"]);
    }

    function getPagesCount(){
        return Article::all()->count();
    }

    function addArticlesFromFile($file){

        $res = 0;
        $openedFile = fopen($file, "r");
        while($str = fgetcsv($openedFile)){
            $arr = [
                "date" => $str["3"],
                "title" => $str["0"],
                "text" => $str["1"],
                "author" => $str["2"],
                "video" => $str["4"] ?? null
            ];
            
            $validator = Validator::make($arr, [
                'date' => 'required',
                'title' => 'required',
                'text' => 'required',
                'author' => 'required',
            ]);
    
            if ($validator->fails()) {
                // return back()->withErrors($validator)->withInput();
            }

            // if (!is_null($arr["img"])){
            //     $imgName = "img/blog/".uniqid().".jpg";
            //     $img = fopen($imgName, 'w');
            //     fwrite($img, base64_decode($arr["img"]));
            //     fclose($img);
            //     $arr["img"] = $imgName;
            // }

            Article::writeArticle($arr);
            $res += 1;
        }
        fclose($openedFile);
        return $res;
    }

    static function saveBlogInFile(){
        $file = "blog.csv";
        $openedFile = fopen($file, 'w');

        $articles = Article::all();
        foreach($articles as $article){
            $av = !is_null($article->video) ? $article->video : "";
            // !is_null($article->img) ? base64_encode(file($article->img)) : (!is_null($article->video) ? base64_encode(file($article->video)) : "");
            // $av = !is_null($article->img) ? base64_encode(file_get_contents("img/blog/firs.jpg")) : "";
            
            fwrite($openedFile, "\"".($article->title ?? "")."\",\"".($article->text ?? "")."\",\"".($article->author ?? "")."\",\"".($article->date ?? "")."\",\"".($av)."\"\n");
        }

        fclose($openedFile);
        return url($file);
    }

    function newComment($authorId, $articleId, $textComment){
        try{
            $comment = new ArticlesComment;
            $comment->author_id = $authorId;
            $comment->article_id = $articleId;
            $comment->comment = $textComment;
            $comment->save();
            return true;
        } catch(Exception $e){
            return $e;
        }
    }

    function hasComment($article_id){
        return ArticlesComment::get()->where('article_id', $article_id)->count();
    }

    function getLastComment($article_id){
        return ArticlesComment::orderBy('id', 'desc')->where('article_id', $article_id)->limit(1)->get()[0]['comment'];
    }

    function getLastCommentAuthor($article_id){
        return User::where('id', ArticlesComment::orderBy('id', 'desc')->where('article_id', $article_id)->limit(1)->get()[0]['author_id'])->get()['0']['name'];
    }
}
