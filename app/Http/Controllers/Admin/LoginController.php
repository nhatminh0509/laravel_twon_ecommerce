<?php

namespace app\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
Use App\Models\User;



class LoginController extends Controller
{
    //
    public function __construct()
    {
 
    }
    
    public function getLogin()
    {
        if (Auth::check()) {
            return redirect()->route('get-admin-home');
        } else {
            return view('admin.Login.login');
        }
    }

    public function postLogin(request $request)
    {   
        $login = [
            'email' => $request->txtEmail,
            'password' => $request->txtPassword,
            'status'   =>1
        ];
        if (Auth::attempt($login)) {
            $user = Auth::user();
            return redirect()->route('get-admin-home');
        }
        else 
        {
            return view('admin.login.login')->with('status', 'Email hoặc Password không chính xác');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return view('admin.Login.login');
    }
}
