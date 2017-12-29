<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

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

    function postForm(Request $req){
        
        if($req->hasFile('hinh')){
            $file = $req->hinh;
            //$file = $req->file('hinh');
            //dd($file);
            //upload
            $nameFile = $file->getClientOriginalName();
            echo $nameFile;
            echo "<br>";

            $ext = $file->extension(); //theo Mime type
            echo $ext;
            echo "<br>";

            $ext2 = $file->getClientOriginalExtension(); //theo ten file
            echo $ext2;
            echo "<br>";
             
            $size = $file->getSize(); //bytes
            echo $size;
            echo "<br>";

            //check file size : <1Mb
            if($size>1024*1024){
                //return redirect()->back()->with('error','File to large!');
                return redirect()->route('form')->with('error','File to large!');
            }
            //only accept doc, docx, pdf, xlsx, xls
            $arrExt = ['doc', 'docx', 'pdf', 'xlsx', 'xls'];
            if(!in_array($ext2,$arrExt)){
                return redirect()->route('form')->with('error','File not accept');
            }
             //rename file
            $file->move('images',time().$nameFile);


            echo "successfully";
        }
        else{
            echo "Ban chua chon file";
        }
    }

    function getFormInput(){
        
        return view('pages.form-input');
    }

    function postFormInput(Request $req){
        //$email = $req->email;
        // $email = $req->input('email');
        // $address = $req->address;
        // echo $address;
        // echo $email;
        // $input = $req->all();
        // dd($input);
        $input = [
            'email'=>'required|email|min:5', //email ko rỗng, phải đúng định dạng
            'hinhanh'=>'required|image',
            'birthdate'=>'required|date_format:d/m/Y',
            'password' => 'required|min:6| max:20',
            'confirm_password'=>'same:password'
        ];
        $mess = [
            'email.required'=>'Email không rỗng',
            'email.email'=>'Email không đúng định dạng example@mail.com',
            'email.min'=>"Email ít nhất :min kí tự"
        ];

        //$req->validate($input,$mess);
        $validator = Validator::make($req->all(), $input,$mess);

        if($validator->fails()) {
            return redirect()->route('form2')
                        ->withErrors($validator)
                        ->withInput();
        }



        $email = $req->email;
        echo $email;
    }


}
