<?php

namespace app\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Detail_Bill;
use App\Models\Voucher;
use App\Models\Customer;
use App\Models\Product;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Auth;

class CartController extends Controller
{
    //
    public function __construct()
    {
 
    }

    public function updateQuantity(Request $request)
    {
        $bill = Bill::findOrFail($request->id_bill);
        $bill->total_Price = 0;
        $bill->price_Checkout = 0;
        foreach($bill->detail_bill as $detail_bill)
        {
            $quantity = "quantity_".$detail_bill->product->id;
            if($request->$quantity == 0)
            {
                $detail_bill->delete();
            }
            else
            {
                $detail_bill->quantity = $request->$quantity;
                $detail_bill->save();
                $bill->total_Price = $bill->total_Price + ($detail_bill->quantity * $detail_bill->price); 
            }
        }
        $bill->price_Checkout = $bill->total_Price *(1-(($bill->voucher->value ?? 0) / 100));
        $bill->save();
        return redirect()->route('getCart',$bill->id);
    }


    public function getCart($id_bill)
    {
        $bill = Bill::where([['id',$id_bill],['status',0]])->first();
        if(isset($bill))
        {
            return view('client.cart.cart')->with('bill',$bill);    
        }
        return redirect()->route('get-client-home');
    }

    public function postCart(Request $request)
    {
        $id_customer = Auth::guard('customer')->user()->id;
        
        $bill = Bill::where([['customer_id',$id_customer],['status',0]])->first();
        $customer = Customer::findOrFail($id_customer);
        if(isset($bill))
        {
            foreach($bill->detail_bill as $detail_bill)
            {
                $detail_bill->delete();
            }
            $bill->delete();    
        }

        $bill = new Bill();
        $bill->customer_id = $id_customer;
        $bill->name=$customer->name;
        $bill->address = $customer->address;
        $bill->phone = $customer->phone;
        $bill->total_Price = 0;
        $bill->price_Checkout = 0;
        $bill->date_create = date("Y-m-d");
        $bill->status = 0;
        $bill->save();

        $sl = $request->soluongsp;
        for($i = 1;$i <= $sl;$i++)
        {
            $product_id = "id_".$i;
            $quantity = "soluong_".$i;
            $price = "gia_sp_".$i;
            $product = Product::findOrFail($request->$product_id);
            $detail_bill = new Detail_Bill();
            $detail_bill->bill_id = $bill->id;
            $detail_bill->product_id = $request->$product_id;
            if($request->$quantity <= $product->quantity)
            {
                $detail_bill->quantity = $request->$quantity;
            }
            else{
                $detail_bill->quantity = $product->quantity;
                Session::put('message','Một số sản phẩm không còn đủ số lượng để cung cấp cho bạn. Xin lổi vì sự bất tiện này');
            }
            $detail_bill->price = $request->$price;
            $detail_bill->save();
            $bill->total_Price = $bill->total_Price + ($detail_bill->quantity * $detail_bill->price); 
        }
        $bill->price_Checkout = $bill->total_Price *(1-(($bill->voucher->value ?? 0) / 100));
        $bill->save();
        return view('client.cart.cart')->with('bill',$bill);
    }

    public function updateVoucher(Request $request)
    {
        $today = date("Y-m-d");
        $bill = Bill::findOrFail($request->bill_id);
        if($request->voucher == "")
        {
            $bill->voucher_id = null;
            $bill->price_Checkout = $bill->total_Price;
            $bill->save();
        }
        $voucher = Voucher::where('code','=',$request->voucher)
        ->where('quantity','>',0)
        ->where('status',1)
        ->first();
        if(isset($voucher))
        {
            if(strtotime($today) >= strtotime($voucher->date_start))
            {
                if(strtotime($today) <= strtotime($voucher->date_end))
                {
                    $bill->voucher_id = $voucher->id;
                    $bill->price_Checkout = $bill->total_Price *(1- ($voucher->value / 100));
                    $bill->save();
                    return redirect()->route('getCart',$bill->id);
                }
                Session::put('message','Mã Giảm Giá Của Bạn Đã Hết Hạn');
                return redirect()->route('getCart',$bill->id);
            }
            Session::put('message','Mã Giảm Giá Của Bạn Chưa Đến Ngày Sử Dụng');
            return redirect()->route('getCart',$bill->id);
        }
        Session::put('message','Mã Giảm Giá Của Bạn Không Tồn Tại');
        return redirect()->route('getCart',$bill->id);
    }

    public function checkOut(Request $request)
    {
        $bill = Bill::findOrFail($request->bill_id);
        $bill->name = $request->name;
        $bill->phone = $request->phone;
        $bill->address = $request->address;
        $bill->desc = $request->desc;
        $bill->status = 1;
        $bill->save();
        foreach($bill->detail_bill as $detail_bill)
        {
            $product = Product::findOrFail($detail_bill->product_id);
            $product->quantity = $product->quantity - $detail_bill->quantity;
            $product->save();
        }
        if(isset($bill->voucher_id))
        {
            $voucher=Voucher::findOrFail($bill->voucher_id);
            $voucher->quantity = $voucher->quantity - 1 ;
            $voucher->save(); 
        }
        return view('client.cart.checkout');
    }

}
