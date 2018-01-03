<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function getHome(){
        return view('pages.trangchu');
    }

    public function getDetail(){
        return view('pages.detail');
    }


    public function getAllProduct(){
        //$foods = DB::table('foods')->get(); //SELECT * FROM foods
        //$foods = DB::table('foods')->select('name','price')->get();

        // $foods = DB::table('foods')
        //         ->select('name as TenSP','price')
        //         ->get();
        // $foods = DB::table('foods')
        //         ->selectRaw('name as TenSP, price as DonGia')
        //         ->get();
        // $foods = DB::table('foods')
        //         ->selectRaw('name as TenSP, price as DonGia')
        //         ->where('id',1)
        //         ->get();

        // $foods = DB::table('foods')
        //         ->selectRaw('name as TenSP, price as DonGia')
        //         ->where([
        //             ['id' , '>', 1],
        //             ['price','>', 50000]
        //         ])
        //         ->get();

        // $foods = DB::table('foods')
        //         ->selectRaw('name as TenSP, price as DonGia')
        //         ->where([
        //             ['id' , '>', 1]
        //         ])
        //         ->orWhere([
        //             ['price','>', 50000]
        //         ])
        //         ->get();
        // $foods = DB::table('foods')
        //         ->selectRaw('name as TenSP, price as DonGia')
        //         ->whereBetween('price', [50000,200000])
        //         ->get();

        $foods = DB::table('foods')
                ->selectRaw('name as TenSP, price as DonGia')
                ->whereIn('id', [1,2,3,5])
                ->get();
                
        dd($foods);
    }
}
