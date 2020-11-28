<?php

namespace app\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Bill_Import;
use App\Models\Detail_Bill_Import;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;


class DepotController extends Controller
{
    //
    public function __construct()
    {
 
    }
    
    // public function getSearch(Request $request)
    // {
    //     if($request->search == '')
    //     {
    //         $view = Session::get('view') ?? 10;
    //         $all_product = Product::paginate($view);
    //         Session::put('view',$view);
    //         return view('admin.product.list')->with('list_product',$all_product);
    //     }
    //     $all_product = Product::where('name','like','%'.$request->search.'%')->get();
    //     return view('admin.product.list')->with('list_product',$all_product);
    // }

    public function getList()
    {
        $view = Session::get('view') ?? 10;
        $all_product = Product::paginate($view);
        Session::put('view',$view);
        return view('admin.depot.list')->with('list_product',$all_product);
    }

    public function postList(Request $request)
    {
        $all_product = Product::paginate($request->view);
        Session::put('view',$request->view);
        return view('admin.depot.list')->with('list_product',$all_product);
    }

    public function getSearch(Request $request)
    {
        if($request->search == '')
        {
            $view = Session::get('view') ?? 10;
            $all_product = Product::paginate($view);
            Session::put('view',$view);
            return view('admin.depot.list')->with('list_product',$all_product);
        }
        $all_product = Product::where('name','like','%'.$request->search.'%')->get();
        return view('admin.depot.list')->with('list_product',$all_product);
    }

    public function getImportSupplier()
    {
        $list_supplier = Supplier::all();
        return view('admin.depot.import')->with('list_supplier',$list_supplier);
    }

    public function postAddBillImport(Request $request) // phuong phap tam thoi
    {
        $id_supplier = $request->supplier_id;
        $id_user = $request->user_id;
        
        $bill = Bill_Import::where([['supplier_id',$id_supplier],['status',0]])->first();
        if(!isset($bill))
        {
            $bill = new Bill_Import();
            $bill->supplier_id = $id_supplier;
            $bill->user_id = $id_user;
            $bill->total_Price = 0;
            $bill->status = 0;
            $bill->save();
        }
        $list_product = Product::all();
        return view('admin.depot.detail_import')->with('bill_import',$bill)->with('list_product',$list_product);
    }

    public function postAddDetailBillImport(Request $request)
    {
        $product_id = $request->product_id;
        $bill_id = $request->id_bill_import;
        $quantity = $request->quantity;
        $price = $request->price;

        $bill_exits = Detail_Bill_Import::where(['bill_import_id' => $bill_id,'product_id'=>$product_id])->count(); // Kiem tra chi tiet hoa don ton tai chua, tồn tại lớn hơn 0
        if($bill_exits > 0) // Kiểm tra tồn tại
        { 
            $detail_bill = Detail_Bill_Import::where(['bill_import_id' => $bill_id,'product_id'=>$product_id])->first();
            $new_quantity = $detail_bill->quantity + $quantity; // so luong moi
            if($new_quantity <= 0) // so luong be hon ko thi xoa
            {
                $detail_bill->delete();
            }
            else
            {
                $detail_bill->quantity = $new_quantity;
                $detail_bill->price = $price;
                $detail_bill->save();
            }
        }
        else // neu chua ton tai
        {
            if($quantity > 0)
            {
                $detail_bill = new Detail_Bill_Import();
                $detail_bill->bill_import_id = $bill_id;
                $detail_bill->product_id = $product_id;
                $detail_bill->quantity = $quantity;
                $detail_bill->price = $price;
                $detail_bill->save();
            }
        }
        
        $bill = Bill_Import::findOrFail($bill_id);
        $total_Price = 0;
        foreach($bill->detail_bill_import as $detail_bill)
        {
            $total_Price = $total_Price + ($detail_bill->price*$detail_bill->quantity);
        }
        $bill->total_Price = $total_Price;
        $bill->save();
        $list_product = Product::all();
        return view('admin.depot.detail_import')->with('bill_import',$bill)->with('list_product',$list_product);
    }
    
    public function payment($id)
    {
        $bill = Bill_Import::findOrFail($id);
        $bill->status = 1;
        $bill->save();
        foreach($bill->detail_bill_import as $detail_bill)
        {
            $product = Product::find($detail_bill->product_id);

            $new_quantity = $detail_bill->quantity + $product->quantity;
            $new_in_price = (($detail_bill->price*$detail_bill->quantity)+($product->quantity*$product->in_price))/$new_quantity;

            $product->quantity = $new_quantity;
            $product->in_price = $new_in_price;
            $product->save();
        }
        Session::put('message','Thanh Toán Hóa Đơn Nhập Thành Công');
        return redirect()->route('get-list-depot');
    }

    public function cancel($id)
    {
        $bill = Bill_Import::findOrFail($id);
        $bill->status = -1;
        $bill->save();
        Session::put('message','Hủy Hóa Đơn Nhập Thành Công');
        return redirect()->route('get-list-depot');
    }

    public function getListBill()
    {
        $dathanhtoan = Bill_Import::where('status',1)->orderBy('id','desc')->paginate(50);
        $chuathanhtoan = Bill_Import::where('status',0)->orderBy('id','desc')->paginate(50);
        $dahuy = Bill_Import::where('status',-1)->orderBy('id','desc')->paginate(50); 
        return view('admin.depot.list_bill')->with('dathanhtoan',$dathanhtoan)->with('chuathanhtoan',$chuathanhtoan)->with('dahuy',$dahuy);
    }

    public function getDetailBill($id_bill)
    {
        $bill = Bill_Import::findOrFail($id_bill);
        return view('admin.depot.detail_bill')->with('bill_import',$bill);
    }
}