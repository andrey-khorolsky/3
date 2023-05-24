<?php

namespace App\Models\AR;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;
    public $timestamps = false;


    function __construct($arr = array()){
        if (isset($arr["date"])) $this["date"] = $arr["date"];
    
        $this["page"] = $arr["page"] ?? parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this["ip"] = $arr["ip"] ?? $_SERVER['REMOTE_ADDR'];
        $this["visitor_host"] = $arr["visitor_host"] ?? gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $this["browser"] = $arr["browser"] ?? $_SERVER['HTTP_USER_AGENT'];
    }

    static function getStatistics($count = 10){
        return self::orderBy("date", "DESC")->paginate($count);
    }
}
