<?php

namespace app\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Product;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class BillController extends Controller
{
    //
    public function __construct()
    {
 
    }
    
    public function getList()
    {
        $view = Session::get('view') ?? 10;
        $all_bill = Bill::where('status','<>',0)->orderByDesc('id')->paginate($view);
        Session::put('view',$view); 
        return view('admin.bill.list')->with('list_bill',$all_bill);
    }

    public function postList(Request $request)
    {
        $all_bill = bill::where('status','<>',0)->paginate($request->view);
        Session::put('view',$request->view);
        return view('admin.bill.list')->with('list_bill',$all_bill);
    }

    public function getListCancle()
    {
        $view = Session::get('view') ?? 10;
        $all_bill = Bill::where('status','=',-1)->orderByDesc('id')->paginate($view);
        Session::put('view',$view); 
        return view('admin.bill.list')->with('list_bill',$all_bill)->with('name','Đã Hủy');
    }

    public function postListCancle(Request $request)
    {
        $all_bill = bill::where('status','=',-1)->paginate($request->view);
        Session::put('view',$request->view);
        return view('admin.bill.list')->with('list_bill',$all_bill)->with('name','Đã Hủy');
    }

    public function getListConfirm()
    {
        $view = Session::get('view') ?? 10;
        $all_bill = Bill::where('status','=',2)->orderByDesc('id')->paginate($view);
        Session::put('view',$view); 
        return view('admin.bill.list')->with('list_bill',$all_bill)->with('name','Đã Xác Nhận');
    }

    public function postListConfirm(Request $request)
    {
        $all_bill = bill::where('status','=',2)->paginate($request->view);
        Session::put('view',$request->view);
        return view('admin.bill.list')->with('list_bill',$all_bill)->with('name','Đã Xác Nhận');
    }

    public function getListNotConfirm()
    {
        $view = Session::get('view') ?? 10;
        $all_bill = Bill::where('status','=',1)->orderByDesc('id')->paginate($view);
        Session::put('view',$view); 
        return view('admin.bill.list')->with('list_bill',$all_bill)->with('name','Chưa Xác Nhận');
    }

    public function postListNotConfirm(Request $request)
    {
        $all_bill = bill::where('status','=',1)->paginate($request->view);
        Session::put('view',$request->view);
        return view('admin.bill.list')->with('list_bill',$all_bill)->with('name','Chưa Xác Nhận');
    }

    public function getListSuccess()
    {
        $view = Session::get('view') ?? 10;
        $all_bill = Bill::where('status','=',3)->orderByDesc('id')->paginate($view);
        Session::put('view',$view); 
        return view('admin.bill.list')->with('list_bill',$all_bill)->with('name','Đã Thành Công');
    }

    public function postListSuccess(Request $request)
    {
        $all_bill = bill::where('status','=',3)->paginate($request->view);
        Session::put('view',$request->view);
        return view('admin.bill.list')->with('list_bill',$all_bill)->with('name','Đã Thành Công');
    }

    public function getDetail($bill_id)
    {
        $bill = bill::findOrFail($bill_id);
        return view('admin.bill.detail')->with('bill', $bill);
    }

    public function confirm($id)
    {
        $bill = Bill::findOrFail($id);
        $bill->status = 2;
        $bill->save();
        return redirect()->back();
    }
    public function success($id)
    {
        $bill = Bill::findOrFail($id);
        $bill->status = 3;
        $bill->save();
        return redirect()->back();
    }
    public function cancle($id)
    {
        $bill = Bill::findOrFail($id);
        $bill->status = -1;
        $bill->save();
        foreach($bill->detail_bill as $detail_bill)
        {
            $product = Product::findOrFail($detail_bill->product_id);
            $product->quantity = $product->quantity + $detail_bill->quantity;
            $product->save(); 
        }
        return redirect()->back();
    }

}
