<?php

namespace App\Models;

use App\Models\AR\Statistic;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statistic_model extends Model
{
    use HasFactory;

    private $pageCount;
    private $statistic;

    function __construct($attributes = array()){
        $this->statistic = Statistic::getStatistics();
        $this->pageCount = ceil(Statistic::all()->count()/10);
    }

    function getStatistic(){
        return $this->statistic;
    }

    function getPagesCount(){
        return $this->pageCount;
    }
}
