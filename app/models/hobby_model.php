<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Hobby_model{

    public $music;
    public $books;
    public $films;
    public $games;


    function __construct(){

        $this->music = (new class extends Model {protected $table = "musicAlbums";})::all();
        $this->books = (new class extends Model {protected $table = "books";})::all();
        $this->films = (new class extends Model {protected $table = "films";})::all();
        $this->games = (new class extends Model {protected $table = "games";})::all();

    }

}
