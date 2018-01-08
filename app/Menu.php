<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    function MenuDetail(){
        return $this->hasMany('App\MenuDetail','id_menu','id');
    }
}
