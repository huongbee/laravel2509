<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Hash;
use Auth;

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
        // echo $req->password;
        // echo Hash::make($req->password);
        // die;
        $user = new User;
        $user->username  = $req->username;
        $user->password = Hash::make($req->password);
        $user->fullname = $req->fullname;
        $user->birthdate = "2018-12-12";
        $user->gender = "nam";
        $user->address = "92 Le Thi Rieng";
        $user->email = $req->email;
        $user->phone = "12345678";
        $user->role = 'admin';
        $user->save();
        if($user){
            return redirect()->route('admin_register')->with('success',"Đăng kí thành công");
        }
        return redirect()->route('admin_register')->with('error',"Đăng kí không thành công");
        
        //insert into `users` (`username`, `password`, `fullname`, `birthdate`, `gender`, `address`, `email`, `phone`, `role`, `updated_at`, `created_at`) values (huongngoc99, $2y$10$megFOC5hgdrLzvt5S7ghNOjTPT0W6URGfSB5OIFs12lsirmKpWPHe, Hương Hương, 2018-12-12, nam, 92 Le Thi Rieng, huongnguyen08.cv@gmail.com, 12345678, admin, 2018-01-12 13:24:37, 2018-01-12 13:24:37)
    }
    function getAdminLogin(){
        return view('login.login');
    }

    function postAdminLogin(Request $req){
        $input = [
            'email'=>'required|email|min:5',
            'password' => 'required|min:6| max:20'
        ];
        $mess = [
            'email.required'=>'Email không rỗng',
            'email.email'=>'Email không đúng định dạng example@mail.com',
            'email.min'=>"Email ít nhất :min kí tự"
        ];

        $validator = Validator::make($req->all(), $input,$mess);

        if($validator->fails()) {
            return redirect()->route('admin_register')
                        ->withErrors($validator)
                        ->withInput();
        }

        $infor = [
            'email'=>$req->email,
            'password'=>$req->password
        ];
        $remember = $req->remember == 1 ? 1 : 0;
        if(Auth::attempt($infor,$remember)){
            //login thanh cong
            $user = Auth::user();
            echo $user->fullname;
            //dd($user);
            return redirect()->route('trang-chu');
        }
        else{
            return redirect()->route('admin_login')->with('error',"Đăng nhập không thành công");
        }
    }
}
