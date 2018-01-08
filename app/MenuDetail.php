<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuDetail extends Model
{
    protected $table = 'menu_detail';

    function Food(){
        return $this->belongsTo('App\Food','id_food','id');
    }
}
