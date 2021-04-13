<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(){
        return view("Admin.auth.login");
    }

    public function loginPost(Request $r){
        if(Auth::attempt(['email' => $r->email, 'password' => $r->password])){
            return redirect()->route("adminpanel");
        }
        return redirect()->route("login")->withErrors("Email Adresi veya Şifre Hatalı..");
    }

    public function logOut(){
        Auth::logout();
        return redirect()->route("login");
    }
}
