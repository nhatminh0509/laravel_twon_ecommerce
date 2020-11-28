<?php

namespace app\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;



class CustomerController extends Controller
{
    //
    public function __construct()
    {
 
    }

    public function postAdd(Request $request)
    {
        $this->Validate($request,
        [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required'
        ]);

        $customer = new Customer();
        $customer['name'] = $request->name;
        $customer['email'] = $request->email;
        $customer['phone'] = $request->phone;
        $customer['address'] = $request->address;
        $customer['password'] = Hash::make($request->password);
        $customer['total_Amount'] = 0;
        $customer['status'] = 1;
        $customer->save();

        Session::put('message','Tạo Tài Khoản Thành Công');
        return view('client.home.account');
    }
}
