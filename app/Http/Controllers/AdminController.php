<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function getAdminRegister(){
        return view('login.register');
    }
    function postAdminRegister(Request $req){
         $input = [
            'email'=>'required|email|min:5',
            'password' => 'required|min:6| max:20',
            'confirm_pw'=>'same:password',
            'username'=>'required|unique:users,username',
            'email'=>'required|unique:users,email'
        ];
        $mess = [
            'email.required'=>'Email không rỗng',
            'email.email'=>'Email không đúng định dạng example@mail.com',
            'email.min'=>"Email ít nhất :min kí tự",
            'email.unique'=>"Email đã có người sử dụng"
        ];

        $validator = Validator::make($req->all(), $input,$mess);

        if($validator->fails()) {
            return redirect()->route('admin_register')
                        ->withErrors($validator)
                        ->withInput();
        }

        //luu vao db
        echo ($req->email);

    }
}
