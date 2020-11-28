<?php

namespace app\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
USE App\Imports\BrandImport;
Use App\Exports\BrandExport;

class BrandController extends Controller
{
    //
    public function __construct()
    {
 
    }
    
    public function getList()
    {
        $view = Session::get('view') ?? 10;
        $all_brand = Brand::paginate($view);
        Session::put('view',$view);
        return view('admin.brand.list')->with('list_brand',$all_brand);
    }

    public function postList(Request $request)
    {
        $all_brand = Brand::paginate($request->view);
        Session::put('view',$request->view);
        return view('admin.brand.list')->with('list_brand',$all_brand);
    }

    public function getSearch(Request $request)
    {
        if($request->search == '')
        {
            $view = Session::get('view') ?? 10;
            $all_brand = Brand::paginate($view);
            Session::put('view',$view);
            return view('admin.brand.list')->with('list_brand',$all_brand);
        }
        $all_brand = Brand::where('name','like','%'.$request->search.'%')->get();
        return view('admin.brand.list')->with('list_brand',$all_brand);
    }

    public function getAdd()
    {
        return view('admin.brand.add');
    }

    public function getDetail($brand_id)
    {
        $brand = Brand::find($brand_id);
        return view('admin.brand.detail')->with('brand', $brand);
    }

    public function getEdit($brand_id)
    {
        $brand = Brand::find($brand_id);
        return view('admin.brand.edit')->with('brand', $brand);
    }

    public function postEdit(Request $request)
    {
        $this->Validate($request,
        [
            'name' => 'required',
            'image' => 'required',
            'desc' => 'required',
            'status' => 'required',
        ]);

        $id = $request->id;

        $get_image = $request->file('image');
        $brand = Brand::find($id);
        $brand['name'] = $request->name;
        $brand['desc'] = $request->desc;
        if($get_image)
        {
            $new_image = $id.'.'.$get_image->getClientOriginalExtension();
            unlink(public_path('uploads/brand/'.$brand->image));
            $get_image->move('uploads/brand',$new_image);
            $brand['image'] = $new_image;
        }
        $brand['status'] = $request->status;
        $brand->save();
        Session::put('message','Cập Nhật Thương Hiệu Thành Công');
        return redirect()->route('get-list-brand');
    }

    public function postAdd(Request $request)
    {
        $this->Validate($request,
        [
            'name' => 'required',
            'image' => 'required',
            'desc' => 'required',
            'status' => 'required',
        ]);

        $brand = new Brand();
        $brand['name'] = $request->name;
        $brand['image'] = $request->image;
        $brand['desc'] = $request->desc;
        $brand['status'] = $request->status;
        $brand->save();

        $get_image = $request->file('image');
        $id = $brand->id;
        if($get_image)
        {
            $new_image = $id.'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/brand',$new_image);
            $brand['image'] = $new_image;
            $brand->save();
        }
        Session::put('message','Thêm Thương Hiệu Thành Công');
        return redirect()->route('get-list-brand');
    }

    public function getDelete($brand_id)
    {
        $brand = Brand::find($brand_id);
        if(is_file(public_path('uploads/brand/'.$brand->image)))
        {
            unlink(public_path('uploads/brand/'.$brand->image));
        }
        $brand->delete();
        Session::put('message','Xóa Thương Hiệu Thành Công');
        return redirect()->route('get-list-brand');
    }

    public function active($brand_id)
    {
        $brand = Brand::find($brand_id);
        $brand->status = 1;
        $brand->save();
        Session::put('message','Kích Hoạt Thương Hiệu Thành Công');
        return redirect()->route('get-list-brand');
    }

    public function unactive($brand_id)
    {
        $brand = Brand::find($brand_id);
        $brand->status = 0;
        $brand->save();
        Session::put('message','Hủy Kích Hoạt Thương Hiệu Thành Công');
        return redirect()->route('get-list-brand');
    }

    public function process_all(Request $request)
    {
        $list_brandID = $request->brandID;
        if($list_brandID!=null)
        {
            if($request->action == "delete")
            {
                foreach($list_brandID as $brand_id)
                {
                    $this->getDelete($brand_id); 
                }
                Session::put('message','Xóa Thương Hiệu Thành Công');
                return redirect()->route('get-list-brand');
            }
            else if($request->action == "active")
            {
                foreach($list_brandID as $brand_id)
                {
                    $this->active($brand_id); 
                }
                Session::put('message','Kích Hoạt Thương Hiệu Thành Công');
                return redirect()->route('get-list-brand');
            }
            else if($request->action == "unactive")
            {
                foreach($list_brandID as $brand_id)
                {
                    $this->unactive($brand_id); 
                }
                Session::put('message','Hủy Kích Hoạt Thương Hiệu Thành Công');
                return redirect()->route('get-list-brand');
            }
        }
        return redirect()->route('get-list-brand');

    }

    public function postImport(Request $request)
    {
        Excel::import(new BrandImport,$request->file);
        Session::put('message','Thêm File Thương Hiệu Sản Phẩm Thành Công');
        return redirect()->route('get-list-brand');
    }

    public function getExport()
    {
        return Excel::download(new BrandExport, 'Brand.xlsx');
    }

    public function viewProduct($id_brand)
    {
        $brand = Brand::find($id_brand);
        $list_product = $brand->product;
        return view('admin.product.list')->with('brand_name',$brand->name)->with('list_product',$list_product);
    }
}
