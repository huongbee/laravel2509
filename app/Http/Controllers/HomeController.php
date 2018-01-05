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

        // $foods = DB::table('foods')
        //         ->selectRaw('name as TenSP, price as DonGia')
        //         ->whereIn('id', [1,2,3,5])
        //         ->orderBy('DonGia','ASC')
        //         ->get();

        //C1
        // $foods = DB::table('foods')
        //         ->selectRaw('name as TenSP, price as DonGia')
        //         ->orderBy('DonGia','DESC')
        //         ->limit(10)
        //         ->get();

        //C2
        // $foods = DB::table('foods')
        //         ->selectRaw('name as TenSP, price as DonGia')
        //         ->orderBy('DonGia','DESC')
        //         ->skip(1) //position
        //         ->take(10) //limit
        //         ->get();
        // $foods = DB::table('foods')
        //         ->selectRaw('avg(price) as DGTB')
        //         ->first();

        // echo $foods->DGTB;
        // foreach($foods as $sp){
        //     echo $sp->DGTB;
        // }
        
        //liệt kê sp thuộc loại 'Xôi'
        // $foods = DB::table('foods as f')
        //         ->selectRaw('f.name as tenSP, price, t.name as TenLoai')
        //         ->join('food_type as t',function($join){
        //             $join->on('t.id','=','f.id_type');
        //             $join->where([
        //                 ['t.name', 'like', 'Xôi']
        //             ]);
        //         })
        //         ->orderBy('TenLoai','ASC')
        //         ->get();
                
        // $foods =DB::table('foods as f')
        //         ->selectRaw('t.name as TenLoai, avg(price) as TB')
        //         ->rightJoin('food_type as t',function($join){
        //             $join->on('t.id','=','f.id_type');
        //         }) 
        //         ->groupBy('TenLoai')
        //         ->get();

        // $foods =DB::table('food_type as t')
        //         ->selectRaw('t.name as TenLoai, max(price) as max')
        //         ->leftJoin('foods as f',function($join){
        //             $join->on('t.id','=','f.id_type');
        //         }) 
        //         ->groupBy('TenLoai')
        //         ->get();
        $foods =DB::table('food_type as t')
                ->selectRaw('t.name as TenLoai, sum(price) as tongtien, count(f.id) as soluong')
                ->join('foods as f',function($join){
                    $join->on('t.id','=','f.id_type');
                })
                ->whereBetween('price',[50000, 100000]) 
                ->groupBy('TenLoai')
                ->get();
        dd($foods);
    }
}
