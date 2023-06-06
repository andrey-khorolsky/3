<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use Exception;
use Illuminate\Http\Request;

class Admin_controller extends Controller
{
    


    //Блог (blog) - статьи в бд
    function newArticle(BlogRequest $blogRequest){
        $this->model->newArticle($blogRequest);
        return back();
    }


    function uploadArticles(){
        // try{
        $countArticles = $this->model->addArticlesFromFile($_FILES["articles"]["tmp_name"]);
        // } catch (Exception $e){
            // die($e);
            // return back()->with("uploadStatus", ("Произошла ошибка при добавлении"));
        // }
        // return view("admin/uploadArticles", ["uploadStatus" => ($countArticles." статей успешно добавлено в блог")]);
        return redirect("admin/uploadArticles")->with("uploadStatus", ($countArticles." статей успешно добавлено в блог"));
    }

    
    //Гостевая книга (guest) - файл с сообщениями
    function uploadComments(){
        $this->model->uploadFromFile($_FILES);
        return view("admin.addCommentFromFile", ["uploadStatus" => "Файл успешно загружен"]);
    }


    //Статистика (statistic)
    function statistic(){
        return view("admin.statistic", ["model" => $this->model]);
    }


    //Скачивание файлов (saveFiles)
    function dovnloadFiles(){
        return view("admin.downloadFiles", ["model" => $this->model]);
    }

}
