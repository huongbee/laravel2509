<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    function getName(){
        echo "Khoa pham training";
    }

    // public function getProduct($name){
    //     echo $name;
    // }
    public function getProduct(Request $request){
        echo $request->name;
        echo $request->id;
    }


    // public function getForm(){
    //     $data = "send data to view";
    //     return view('form-demo',['a'=>$data]);
    // }
    // public function getForm(){
    //     return view('pages.trangchu');
    //     //return view('pages/trangchu');
    // }

    public function getForm(){
        return view('form');
    }
}
