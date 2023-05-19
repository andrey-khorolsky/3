<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Photoalbum_model{

    public $photos;
    
    function __construct(){
    
        $this->photos = (new class extends Model {protected $table = "carPhotos";})::all();
        
    }

}