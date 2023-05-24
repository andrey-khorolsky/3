<?php

use App\Http\Controllers\Admin_controller;
use App\Http\Controllers\Contact_controller;
use App\Http\Controllers\Test_controller;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\GuestRequest;
use App\Http\Requests\TestRequest;
use App\Models\statistic_model;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog_controller;
use App\Http\Controllers\Hobby_controller;
use App\Http\Controllers\Photoalbum_controller;
use App\Http\Controllers\Guest_controller;
use App\Models\Blog_model;
use App\Models\Guest_model;
use App\Models\Hobby_model;
use App\Models\Photoalbum_model;
use App\Models\Test_model;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::view("/", "main");



Route::view("/about", "about");



Route::get("/guest", function(){
    return (new Guest_controller(new Guest_model()))->show();
});

Route::view("/guest/newComment", "guest.newComment");

Route::post("/guest/create", function(GuestRequest $request){
    $token = $request->session()->token();
    $token = csrf_token();
    return (new Guest_controller(new Guest_model))->create($request);
});




Route::get("/blog", function (){
    return (new Blog_controller(new Blog_model))->show();
});



Route::get("/hobby", function(){
    return (new Hobby_controller(new Hobby_model))->show();
});



Route::get("/photoalbum", function(){
    return (new Photoalbum_controller(new Photoalbum_model))->show();
});



Route::view("/contacts", "contacts.contacts");

Route::post("/contacts", function(ContactRequest $contactRequest){
    $token = $contactRequest->session()->token();
    $token = csrf_token();
    return (new Contact_controller)->check($contactRequest);
});



Route::view("/test", "test.test");

Route::post("/test", function(TestRequest $testRequest){
    $token = $testRequest->session()->token();
    $token = csrf_token();
    return (new Test_controller(new Test_model($testRequest)))->check($testRequest);
});



Route::view("/account", "account.account");



Route::view("/school", "school");




Route::view("/admin", "admin.main");

Route::view("/admin/newArticle", "admin.newArticle");

Route::view("/admin/addFileWithArticles", "admin.addFileWithArticle");

Route::view("/admin/addCommentsFromFile", "admin.addCommentFromFile");

Route::post("/admin/newArticle", function(BlogRequest $blogRequest){
    (new Admin_controller(new Blog_model))->newArticle($blogRequest);
    return back();
});

Route::post("/admin/uploadArticles", function(){
    return (new Admin_controller(new Blog_model))->uploadArticles();
});

Route::post("/admin/uploadComments", function(){
    return (new Admin_controller(new Guest_model))->uploadComments();
});

Route::get("/admin/statistic", function(){
    return (new Admin_controller(new statistic_model))->statistic();
});

