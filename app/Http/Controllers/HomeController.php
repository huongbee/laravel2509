<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getHome(){
        return view('pages.trangchu');
    }

    public function getDetail(){
        return view('pages.detail');
    }
}
