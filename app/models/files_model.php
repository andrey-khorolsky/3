<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files_model extends Model
{
    use HasFactory;

    function getGuestFile(){
        return Guest_model::saveGuestInFile();
    }

    function getBlogFile(){
        return Blog_model::saveBlogInFile();
    }
}
