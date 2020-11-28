<?php

namespace app\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\supplier;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;



class supplierController extends Controller
{
    //
    public function __construct()
    {
 
    }
    
    public function getList()
    {
        $view = Session::get('view') ?? 10;
        $all_supplier = Supplier::paginate($view);
        Session::put('view',$view);
        return view('admin.supplier.list')->with('list_supplier',$all_supplier);
    }

    public function postList(Request $request)
    {
        $all_supplier = supplier::paginate($request->view);
        Session::put('view',$request->view);
        return view('admin.supplier.list')->with('list_supplier',$all_supplier);
    }

    public function getSearch(Request $request)
    {
        if($request->search == '')
        {
            $view = Session::get('view') ?? 10;
            $all_supplier = supplier::paginate($view);
            Session::put('view',$view);
            return view('admin.supplier.list')->with('list_supplier',$all_supplier);
        }
        $all_supplier = supplier::where('name','like','%'.$request->search.'%')->get();
        return view('admin.supplier.list')->with('list_supplier',$all_supplier);
    }

    public function getAdd()
    {
        return view('admin.supplier.add');
    }

    public function getDetail($supplier_id)
    {
        $supplier = supplier::find($supplier_id);
        return view('admin.supplier.detail')->with('supplier', $supplier);
    }

    public function getEdit($supplier_id)
    {
        $supplier = supplier::find($supplier_id);
        return view('admin.supplier.edit')->with('supplier', $supplier);
    }

    public function postEdit(Request $request)
    {
        $this->Validate($request,
        [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $id = $request->id;
        $supplier = supplier::find($id);
        $supplier['name'] = $request->name;
        $supplier['email'] = $request->email;
        $supplier['phone'] = $request->phone;
        $supplier['address'] = $request->address;
        $supplier->save();
        Session::put('message','Cập Nhật Nhà Cung Cấp Thành Công');
        return redirect()->route('get-list-supplier');
    }

    public function postAdd(Request $request)
    {
        $this->Validate($request,
        [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'status' => 'required',
        ]);

        $supplier = new supplier();
        $supplier['name'] = $request->name;
        $supplier['email'] = $request->email;
        $supplier['phone'] = $request->phone;
        $supplier['address'] = $request->address;
        $supplier['status'] = $request->status;
        $supplier->save();
        Session::put('message','Thêm Nhà Cung Cấp Thành Công');
        return redirect()->route('get-list-supplier');
    }

    public function getDelete($supplier_id)
    {
        $supplier = supplier::find($supplier_id);
        if(is_file(public_path('uploads/supplier/'.$supplier->image)))
        {
            unlink(public_path('uploads/supplier/'.$supplier->image));
        }
        $supplier->delete();
        Session::put('message','Xóa Nhà Cung Cấp Thành Công');
        return redirect()->back();
    }

    public function active($supplier_id)
    {
        $supplier = supplier::find($supplier_id);
        $supplier->status = 1;
        $supplier->save();
        Session::put('message','Kích Hoạt Nhà Cung Cấp Thành Công');
        return redirect()->back();
    }

    public function unactive($supplier_id)
    {
        $supplier = supplier::find($supplier_id);
        $supplier->status = 0;
        $supplier->save();
        Session::put('message','Hủy Kích Hoạt Nhà Cung Cấp Thành Công');
        return redirect()->back();
    }

    public function process_all(Request $request)
    {
        $list_supplierID = $request->supplierID;
        if($list_supplierID!=null)
        {
            if($request->action == "delete")
            {
                foreach($list_supplierID as $supplier_id)
                {
                    $this->getDelete($supplier_id); 
                }
                Session::put('message','Xóa Nhà Cung Cấp Thành Công');
                return redirect()->back();
            }
            else if($request->action == "active")
            {
                foreach($list_supplierID as $supplier_id)
                {
                    $this->active($supplier_id); 
                }
                Session::put('message','Kích Hoạt Nhà Cung Cấp Thành Công');
                return redirect()->back();
            }
            else if($request->action == "unactive")
            {
                foreach($list_supplierID as $supplier_id)
                {
                    $this->unactive($supplier_id); 
                }
                Session::put('message','Không Kích Hoạt Nhà Cung Cấp Thành Công');
                return redirect()->back();
            }
        }
        return redirect()->back();
    }
}
