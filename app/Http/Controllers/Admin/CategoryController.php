<?php

namespace app\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
USE App\Imports\CategoryImport;
Use App\Exports\CategoryExport;


class CategoryController extends Controller
{
    //
    public function __construct()
    {
 
    }
    
    public function getList()
    {
        $view = Session::get('view') ?? 10;
        $all_category = Category::orderByDesc('id')->paginate($view);
        Session::put('view',$view);
        return view('admin.category.list')->with('list_category',$all_category);
    }

    public function postList(Request $request)
    {
        $all_category = Category::paginate($request->view);
        Session::put('view',$request->view);
        return view('admin.category.list')->with('list_category',$all_category);
    }

    public function getSearch(Request $request)
    {
        if($request->search == '')
        {
            $view = Session::get('view') ?? 10;
            $all_category = Category::paginate($view);
            Session::put('view',$view);
            return view('admin.category.list')->with('list_category',$all_category);
        }
        $all_category = Category::where('name','like','%'.$request->search.'%')->get();
        return view('admin.category.list')->with('list_category',$all_category);
    }

    public function getAdd()
    {
        return view('admin.category.add');
    }

    public function getDetail($category_id)
    {
        $category = Category::find($category_id);
        return view('admin.category.detail')->with('category', $category);
    }

    public function getEdit($category_id)
    {
        $category = Category::find($category_id);
        return view('admin.category.edit')->with('category', $category);
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
        $category = Category::find($id);
        $category['name'] = $request->name;
        $category['desc'] = $request->desc;
        if($get_image)
        {
            $new_image = $id.'.'.$get_image->getClientOriginalExtension();
            unlink(public_path('uploads/category/'.$category->image));
            $get_image->move('uploads/category',$new_image);
            $category['image'] = $new_image;
        }
        $category['status'] = $request->status;
        $category->save();
        Session::put('message','Cập Nhật Danh Mục Sản Phẩm Thành Công');
        return redirect()->route('get-list-category');
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

        $category = new Category();
        $category['name'] = $request->name;
        $category['image'] = $request->image;
        $category['desc'] = $request->desc;
        $category['status'] = $request->status;
        $category->save();

        $get_image = $request->file('image');
        $id = $category->id;
        if($get_image)
        {
            $new_image = $id.'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/category',$new_image);
            $category['image'] = $new_image;
            $category->save();
        }
        Session::put('message','Thêm Danh Mục Sản Phẩm Thành Công');
        return redirect()->route('get-list-category');
    }

    public function getDelete($category_id)
    {
        $category = Category::find($category_id);
        if(is_file(public_path('uploads/category/'.$category->image)))
        {
            unlink(public_path('uploads/category/'.$category->image));
        }
        $category->delete();
        Session::put('message','Xóa Danh Mục Sản Phẩm Thành Công');
        return redirect()->back();
    }

    public function active($category_id)
    {
        $category = Category::find($category_id);
        $category->status = 1;
        $category->save();
        Session::put('message','Kích Hoạt Danh Mục Sản Phẩm Thành Công');
        return redirect()->back();
    }

    public function unactive($category_id)
    {
        $category = Category::find($category_id);
        $category->status = 0;
        $category->save();
        Session::put('message','Hủy Kích Hoạt Danh Mục Sản Phẩm Thành Công');
        return redirect()->back();
    }

    public function process_all(Request $request)
    {
        $list_categoryID = $request->categoryID;
        if($list_categoryID!=null)
        {
            if($request->action == "delete")
            {
                foreach($list_categoryID as $category_id)
                {
                    $this->getDelete($category_id); 
                }
                Session::put('message','Xóa Danh Mục Sản Phẩm Thành Công');
                return redirect()->back();
            }
            else if($request->action == "active")
            {
                foreach($list_categoryID as $category_id)
                {
                    $this->active($category_id); 
                }
                Session::put('message','Kích Hoạt Danh Mục Sản Phẩm Thành Công');
                return redirect()->back();
            }
            else if($request->action == "unactive")
            {
                foreach($list_categoryID as $category_id)
                {
                    $this->unactive($category_id); 
                }
                Session::put('message','Không Kích Hoạt Danh Mục Sản Phẩm Thành Công');
                return redirect()->back();
            }
        }
        return redirect()->back();

    }

    public function postImport(Request $request)
    {
        Excel::import(new CategoryImport,$request->file);
        Session::put('message','Thêm File Danh Mục Sản Phẩm Thành Công');
        return redirect()->route('get-list-category');
    }

    public function getExport()
    {
        return Excel::download(new CategoryExport, 'Category.xlsx');
    }

    public function viewProduct($id_category)
    {
        $category = Category::find($id_category);
        $list_product = $category->product;
        return view('admin.product.list')->with('category_name',$category->name)->with('list_product',$list_product);
    }

}
