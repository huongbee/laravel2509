<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';

    //1-1
    function PageUrl(){
        return $this->belongsTo('App\PageUrl','id_url','id');
    }

    //1-n
    function FoodType(){
        return $this->belongsTo('App\FoodType','id_type','id');
        //id_type: fk
        //id : type // other key
    }

    //
}
