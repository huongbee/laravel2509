<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';

    function PageUrl(){
        return $this->hasOne('App\PageUrl','id_food','id');
        // id_url: foreign key
        // id: primary of foods
        
    }

    //
}
