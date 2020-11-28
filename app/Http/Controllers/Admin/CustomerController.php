<?php

namespace app\Http\Controllers\Admin;

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
    
    public function getDetail($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.customer.detail')->with('customer',$customer);
    }

    public function getList()
    {
        $view = Session::get('view') ?? 10;
        $customer = Customer::paginate($view);
        Session::put('view',$view);
        return view('admin.customer.list')->with('list_customer',$customer);
    }

    public function postList(Request $request)
    {
        $view = $request->view;
        $customer = Customer::paginate($view);
        Session::put('view',$view);
        return view('admin.customer.list')->with('list_customer',$customer);
    }

    public function getSearch(Request $request)
    {
        $customer = Customer::all();
        if($request->search == '')
        {
            $this->getList();
        }
        $customer = Customer::where('name','like','%'.$request->search.'%')->get();
        return view('admin.customer.list')->with('list_customer',$customer);
    }

    public function getDelete($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        Session::put('message','Xóa Khách Hàng Thành Công');
        return redirect()->back();
    }
    public function active($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->status = 1;
        $customer->save();
        Session::put('message','Kích Hoạt Khách Hàng Thành Công');
        return redirect()->back();
    }

    public function unactive($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->status = 0;
        $customer->save();
        Session::put('message','Hủy Kích Hoạt Khách Hàng Thành Công');
        return redirect()->back();
    }

    public function process_all(Request $request)
    {
        $list_customerID = $request->customerID;
        if($list_customerID!=null)
        {
            if($request->action == "delete")
            {
                foreach($list_customerID as $id)
                {
                    $this->getDelete($id); 
                }
                Session::put('message','Xóa Khách Hàng Thành Công');
                return redirect()->back();
            }
            else if($request->action == "active")
            {
                foreach($list_customerID as $id)
                {
                    $this->active($id); 
                }
                Session::put('message','Kích Hoạt Khách Hàng Thành Công');
                return redirect()->back();
            }
            else if($request->action == "unactive")
            {
                foreach($list_customerID as $id)
                {
                    $this->unactive($id); 
                }
                Session::put('message','Không Kích Hoạt Khách Hàng Thành Công');
                return redirect()->back();
            }
        }
        return redirect()->back();
    }
}
