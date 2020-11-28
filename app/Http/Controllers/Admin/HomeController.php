<?php

namespace app\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Customer;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;



class HomeController extends Controller
{
    //
    public function __construct()
    {
 
    }
    
    public function getHome()
    {
        $count_admin = User::where('status',1   )->count();
        $count_supplier = Supplier::where('status',1)->count();
        $count_category = Category::where('status',1)->count();
        $count_brand = Brand::where('status',1)->count();
        $count_product = Product::where('status',1)->count();
        $count_customer = Customer::where('status',1)->count();

        $count = array('admin'=>$count_admin,'supplier'=>$count_supplier,'category'=>$count_category,'brand'=>$count_brand,'product'=>$count_product,'customer'=>$count_customer);
        return view('admin.home.home')->with('count',$count);
    }
}
