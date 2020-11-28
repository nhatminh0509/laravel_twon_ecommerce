<?php

namespace app\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;



class VoucherController extends Controller
{
    //
    public function __construct()
    {
 
    }
    
    public function getSearch(Request $request)
    {   
        if($request->search == '')
        {
            $view = Session::get('view') ?? 10;
            $all_voucher = Voucher::paginate($view);
            Session::put('view',$view);
            return view('admin.voucher.list')->with('list_voucher',$all_voucher);
        }
        $all_voucher = Voucher::where('code','like','%'.$request->search.'%')->get();
        return view('admin.voucher.list')->with('list_voucher',$all_voucher);
    }

    public function getList()
    {
        $view = Session::get('view') ?? 10;
        $all_voucher = Voucher::paginate($view);
        Session::put('view',$view);
        return view('admin.voucher.list')->with('list_voucher',$all_voucher);
    }

    public function postList(Request $request)
    {
        $all_voucher = Voucher::paginate($request->view);
        Session::put('view',$request->view);
        return view('admin.voucher.list')->with('list_voucher',$all_voucher);
    }

    public function getAdd()
    {
        return view('admin.voucher.add');
    }

    public function getDetail($id)
    {
        $voucher = Voucher::find($id);
        return view('admin.voucher.detail')->with('voucher', $voucher);
    }

    public function getEdit($id)
    {
        $voucher = Voucher::find($id);
        return view('admin.voucher.edit')->with('voucher', $voucher)    ;
    }

    public function postEdit(Request $request)
    {
        $this->Validate($request,
        [
            'id' => 'required',
            'code' => 'required',
            'value' => 'required',
            'quantity'=>'required',
            'date_start' => 'required',
            'date_end' => 'required',
        ]);

        $id = $request->id;
        $voucher = Voucher::find($id);
        $voucher['code'] = $request->code;
        $voucher['value'] = $request->value;
        $voucher['quantity'] = $request->quantity;
        $voucher['date_start'] = $request->date_start;
        $voucher['date_end'] = $request->date_end;
        $voucher->save();
        Session::put('message','Cập Nhật Mã Giảm Giá Thành Công');
        return redirect()->route('get-list-voucher');
    }

    public function postAdd(Request $request)
    {
        $this->Validate($request,
        [
            'code' => 'required',
            'value' => 'required',
            'quantity'=>'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'status' => 'required',
        ]);
        $listVoucher = Voucher::all();
        foreach($listVoucher as $vou)
        {
            if($request->code == $vou->code)
            {
                Session::put('message','Thêm Mã Giảm Giá Không Thành Công. Mã Giảm Giá Đã Tồn Tại');
                return redirect()->route('get-list-voucher');
            }
        }
        $voucher = new Voucher();
        $voucher['code'] = $request->code;
        $voucher['value'] = $request->value;
        $voucher['quantity'] = $request->quantity;
        $voucher['date_start'] = $request->date_start;
        $voucher['date_end'] = $request->date_end;
        $voucher['status'] = $request->status;
        $voucher->save();
        Session::put('message','Thêm Mã Giảm Giá Thành Công');
        return redirect()->route('get-list-voucher');
    }

    public function getDelete($id)
    {
        $voucher = Voucher::find($id);
        $voucher->delete();
        Session::put('message','Xóa Mã Giảm Giá Thành Công');
        return redirect()->back();
    }

    public function active($id)
    {
        $voucher = Voucher::find($id);
        $voucher->status = 1;
        $voucher->save();
        Session::put('message','Kích Hoạt Mã Giảm Giá Thành Công');
        return redirect()->back();
    }

    public function unactive($id)
    {
        $voucher = Voucher::find($id);
        $voucher->status = 0;
        $voucher->save();
        Session::put('message','Kích Hoạt Mã Giảm Giá Thành Công');
        return redirect()->back();
    }

    public function process_all(Request $request)
    {
        $list_voucherID = $request->voucherID;
        if($list_voucherID!=null)
        {
            if($request->action == "delete")
            {
                foreach($list_voucherID as $id)
                {
                    $this->getDelete($id); 
                }
                Session::put('message','Xóa Mã Giảm Giá Thành Công');
                return redirect()->back();
            }
            else if($request->action == "active")
            {
                foreach($list_voucherID as $id)
                {
                    $this->active($id); 
                }
                Session::put('message','Kích Hoạt Mã Giảm Giá Thành Công');
                return redirect()->back();
            }
            else if($request->action == "unactive")
            {
                foreach($list_voucherID as $id)
                {
                    $this->unactive($pid); 
                }
                Session::put('message','Không Kích Hoạt Mã Giảm Giá Thành Công');
                return redirect()->back();
            }
        }
        return redirect()->back();
    }
}
