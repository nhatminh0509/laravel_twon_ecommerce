<?php

namespace app\Http\Controllers\Client;

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

    public function postLogin(request $request)
    {   
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'status'   =>1
        ];
        if (Auth::guard('customer')->attempt($login)) {
            $user = Auth::guard('customer')->user();
            return redirect()->route('get-client-home');
        }
        else 
        {
            return view('client.home.account')->with('status', 'Email hoặc Password không chính xác');
        }
    }

    public function getLogout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('get-client-home');
    }
}
