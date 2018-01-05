<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageUrl extends Model
{
    protected $table = 'page_url';

    function Food(){
        return $this->belongsTo('App\Food','id_food','id');
    }
}
