<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('home', function () {
    return view('welcome');
});

Route::get('index',function(){
    echo 2345;
});

Route::get('index-2',function(){
    return view('home');
});


Route::get('index-3/{name}',function($ten){
    //echo $_GET['name']; //khoapham
    echo $ten;
})->where('name','[a-zA-Z]+');


Route::get('index-3/{name}-{age}',function($ten,$tuoi){
    echo $ten;
    echo "<br>";
    echo $tuoi;
})->where([
    'name'=>'[a-zA-Z]+',
    'age' => '\d+' //[0-9]+
]);


Route::get('list-product/{page?}',function($page = 3){
    echo $page;
})->where('page','[0-9]+');

//login
Route::get('login',function(){
    echo "this is login page";
})->name('login-page');


Route::group(['prefix'=>'admin'],function(){
    //homepage

    //  admin/  || admin
    Route::get('/',function(){
        if(!Auth::check()){ // Auth::check() kiem tra cos dang nhap hay chua
            //sai thong tin dang nhap;
            return redirect()->route('login-page');
        }
        else{
            echo "Dang nhap thanh cong";
        }
    });


    // admin/edit-prodcut 
    Route::get('edit-product',function(){
        echo "trang edit sp";
    });
});






