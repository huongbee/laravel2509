<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Food;
use App\FoodType;
use App\Menu;
use App\User;
use App\Role;

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

    function getProducts(){
        //$foods = Food::get(); //Food::all();

            // $foods = Food::selectRaw('name as TenSP, price as DonGia')
            //         ->whereIn('id', [1,2,3,5])
            //         ->orderBy('DonGia','ASC')
            //         ->get();

            // $foods = Food::with('PageUrl')
            //         // ->join('food_type as t',function($join){
            //         //     $join->on('t.id','=','foods.id_type');
            //         // })
            //         ->whereIn('foods.id',[1,2,3,4,5,6])
            //         ->get();

            // foreach($foods as $sp){
            //     echo "- Tên sp: ".$sp->name;
            //     echo "<br>";

            //     echo "- Giá sp: ".$sp->price;
            //     echo "<br>";

            //     echo "- URL sp: ".$sp->PageUrl->url;
            //     echo "<br>";

                
            //     echo "<hr>";
            // }

        // dd($foods);


        //thống kê sp theo từng loại, cho biết tổng số sp theo loại
        /**
         * -loại 1: các cột bảng loại, tongSP
         *      - các SP thuộc loại đó sp1: 
         *                             sp2:.... 
         *                             sp3:....
         * 
         */

        // $types = FoodType::with('Food')->get();
            // //dd($types);
            // foreach($types as $type){
            //     echo "<h3>Loại ".$type->id . ' - '. $type->name .
            //         ' có '.count($type->Food).' sản phẩm:</h3><br>';

            //     $stt = 1;
            //     foreach($type->Food as $food){
            //         echo $stt++." - ".$food->name."<br>";
            //     }
            //     echo "<hr>";
            // }

            //liet kê danh sách sp, cho biết tên loại
            // $foods = Food::with('FoodType')->get();
            // //dd($foods);
            // foreach($foods as $food){
            //     echo $food->id . ' - '.$food->name;
            //     echo ' thuộc loại <b>'. $food->FoodType->name. "</b>";
            //     echo "<br>";
        // }

        //liệt ke ds menu, cho biết mã món ăn và số lượng của món ăn theo từng chi tiết

        // $menus = Menu::with('MenuDetail', 'MenuDetail.Food')->get();
        // foreach($menus as $menu){
        //     echo "<b>".$menu->name.":</b><br>";
        //     foreach($menu->MenuDetail as $detail){
        //         echo "- Mã món: ".$detail->id_food.':';
        //         echo $detail->Food->name;
        //         // echo " thuộc loại <b>".$detail->Food->FoodType->name.'</b>';
        //         echo " và số lượng là: ".$detail->quantity .'<br>';
        //     }
            
        //     echo "<hr>";
        // }

        //liệt ke ds user, cho biết quyền của từng user
        // $users =  User::with('Role')->get();
        // foreach($users as $user){
        //     echo $user->username ;
        //     echo ":<br>";
        //     foreach($user->Role as $quyen){
        //         echo '- '.$quyen->role ."<br>";
        //     }
        //     echo "<hr>";
        // }

        // $roles =  Role::with('User')->get();
        // foreach($roles as $role){
        //     echo $role->role ;
        //     echo ":<br>";
        //     foreach($role->User as $u){
        //         echo '- '.$u->username ."<br>";
        //     }
        //     echo "<hr>";
        // }

        //cho bieets ds menu và tên các món ăn có trong menu đó
        // $menus = Menu::with("Food")->get();
        // foreach($menus as $menu){
        //     echo "<b>".$menu->id.' - '.$menu->name;
        //     echo ":</b><br>";
        //     foreach($menu->Food as $food){
        //         echo $food->id .' - '.$food->name;
        //         echo "<br>";
        //     }
        //     echo "<hr>";
        // }

        // $menus = Menu::with("Food")->get()->toArray();
        // //  dd($menus);
        // foreach($menus as $menu){
        //     echo "<b>".$menu['id'].' - '.$menu['name'];
        //     echo ":</b><br>";
        //     foreach($menu['food'] as $food){
        //         echo $food['id'] .' - '.$food['name'];
        //         echo "<br>";
        //     }
        //     echo "<hr>";
        // }


        //liệt kê ds món ăn, cho  biết món ăn đang thuộc những thực đơn nào

        // $foods = Food::with('Menu')->get();
        // foreach($foods as $food){
        //      echo "<b>".$food->id.' - '.$food->name;
        //     echo ":</b><br>";
        //     foreach($food->Menu as $menu){
        //         echo ' - '.$menu->name;
        //         echo "<br>";
        //     }
        //     echo "<hr>";
        // }
        //cho biết món ăn có tên "Tôm sú nướng ngũ vị" đang có ở những thực đơn nào?
        // $food = Food::with('Menu')
        //         ->where('name','Tôm sú nướng ngũ vị')
        //         ->first();
                
        // echo "<b>".$food->id.' - '.$food->name;
        // echo ":</b><br>";
        // foreach($food->Menu as $menu){
        //     echo ' - '.$menu->name;
        //     echo "<br>";
        // }

        //Liệt kê ds loại món ăn, cho biết loại đó có trong những chi tiết menu nào?

        // $types = FoodType::with('MenuDetail')->get();
        // foreach($types as $type){
        //     echo "<b>".$type->id.' - '.$type->name;
        //     echo ":</b><br>";
        //     foreach($type->MenuDetail as $detail){
        //         echo ' - '.$detail->id;
        //         echo "<br>";
        //     }
        //     echo "<hr>";
        // }

        ////Liệt kê chi tiết menu, cho biết chi tiết đó có những món ăn đang thuộc những loại nào?

        $details = \App\MenuDetail::with('FoodType')->get();
        foreach($details as $detail){
            echo "<b>".$detail->id;
            echo ":</b><br>";
            foreach($detail->FoodType as $type){
                echo ' - '.$type->name;
                echo "<br>";
            }
            echo "<hr>";
        }
    }


    

}
