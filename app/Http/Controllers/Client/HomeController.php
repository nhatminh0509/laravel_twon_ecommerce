<?php

namespace app\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Auth;


class HomeController extends Controller
{
    //
    public function __construct()
    {
 
    }
    
    public function getHome()
    {
        $list_product = Product::where([['status',1],['quantity','>',0]])->take(8)->get();
        return view('client.home.home')->with('list_product',$list_product);
    }

    public function getAbout()
    {
        return view('client.home.about');
    }

    public function getContact()
    {
        return view('client.home.contact');
    }
    public function getAccount()
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('get-client-home');
        } else {
            return view('client.home.account');
        }
    }
}
