<?php

namespace app\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;



class ProductController extends Controller
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
            $all_product = Product::paginate($view);
            Session::put('view',$view);
            return view('admin.product.list')->with('list_product',$all_product);
        }
        $all_product = Product::where('name','like','%'.$request->search.'%')->get();
        return view('admin.product.list')->with('list_product',$all_product);
    }

    public function getList()
    {
        $view = Session::get('view') ?? 10;
        $all_product = Product::paginate($view);
        Session::put('view',$view);
        return view('admin.product.list')->with('list_product',$all_product);
    }

    public function postList(Request $request)
    {
        $all_product = Product::paginate($request->view);
        Session::put('view',$request->view);
        return view('admin.product.list')->with('list_product',$all_product);
    }

    public function getAdd()
    {
        $list_category = Category::where('status',1)->get();
        $list_brand = Brand::all();
        return view('admin.product.add')->with('list_category',$list_category)->with('list_brand',$list_brand);
    }

    public function getDetail($product_id)
    {
        $product = Product::find($product_id);
        $category = Category::all();
        $brand = Brand::all();
        return view('admin.product.detail')->with('product', $product)->with('all_category', $category)->with('all_brand', $brand);
    }

    public function getEdit($product_id)
    {
        $product = Product::find($product_id);
        $list_category = Category::where('status',1)->get();
        $list_brand = Brand::where('status',1)->get();
        return view('admin.product.edit')->with('product', $product)->with('list_category', $list_category)->with('list_brand', $list_brand);
    }

    public function postEdit(Request $request)
    {
        $this->Validate($request,
        [
            'name' => 'required',
            'out_price' => 'required',
            'desc' => 'required',
            'status' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
        ]);

        $id = $request->id;
        $product = Product::find($id);
        $product['name'] = $request->name;
        $product['out_price'] = $request->out_price;
        $product['desc'] = $request->desc;
        $product['category_id'] = $request->category_id;
        $product['brand_id'] = $request->brand_id;
        $product['status'] = $request->status;
        
        $get_image_1 = $request->file('image_1');
        if($get_image_1)
        {
            if(is_file(public_path('uploads/product/'.$product->image_1)))
            {
                unlink(public_path('uploads/product/'.$product->image_1));
            }
            $new_image_1 = $id.'_1.'.$get_image_1->getClientOriginalExtension();
            $get_image_1->move('uploads/product',$new_image_1);
            $product['image_1'] = $new_image_1;
        }
        $get_image_2 = $request->file('image_2');
        if($get_image_2)
        {
            if(is_file(public_path('uploads/product/'.$product->image_2)))
            {
                unlink(public_path('uploads/product/'.$product->image_2));
            }
            $new_image_2 = $id.'_2.'.$get_image_2->getClientOriginalExtension();
            $get_image_2->move('uploads/product',$new_image_2);
            $product['image_2'] = $new_image_2;
        }
        $product->save();
        Session::put('message','Cập Nhật Sản Phẩm Thành Công');
        return redirect()->route('get-list-product');
    }

    public function postAdd(Request $request)
    {
        $this->Validate($request,
        [
            'name' => 'required',
            'out_price' => 'required',
            'desc' => 'required',
            'status' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'image_1' => 'required',
            'image_2' => 'required',
        ]);

        $product = new Product();
        $product['name'] = $request->name;
        $product['image_1'] = $request->image_1;
        $product['image_2'] = $request->image_2;
        $product['out_price'] = $request->out_price;
        $product['desc'] = $request->desc;
        $product['category_id'] = $request->category_id;
        $product['brand_id'] = $request->brand_id;
        $product['status'] = $request->status;
        $product->save();

        $id = $product->id;
        
        $get_image_1 = $request->file('image_1');
        if($get_image_1)
        {
            $new_image_1 = $id.'_1.'.$get_image_1->getClientOriginalExtension();
            $get_image_1->move('uploads/product',$new_image_1);
            $product['image_1'] = $new_image_1;
            $product->save();
        }
        $get_image_2 = $request->file('image_2');
        if($get_image_2)
        {
            $new_image_2 = $id.'_2.'.$get_image_2->getClientOriginalExtension();
            $get_image_2->move('uploads/product',$new_image_2);
            $product['image_2'] = $new_image_2;
            $product->save();
        }
        Session::put('message','Thêm Sản Phẩm Thành Công');
        return redirect()->route('get-list-product');
    }

    public function getDelete($product_id)
    {
        $product = Product::find($product_id);
        if(is_file(public_path('uploads/product/'.$product->image_1)))
        {
            unlink(public_path('uploads/product/'.$product->image_1));
        }
        if(is_file(public_path('uploads/product/'.$product->image_2)))
        {
            unlink(public_path('uploads/product/'.$product->image_2));
        }
        $product->delete();
        Session::put('message','Xóa Sản Phẩm Thành Công');
        return redirect()->back();
    }

    public function active($product_id)
    {
        $product = Product::find($product_id);
        $product->status = 1;
        $product->save();
        Session::put('message','Kích Hoạt Sản Phẩm Thành Công');
        return redirect()->back();
    }

    public function unactive($product_id)
    {
        $product = Product::find($product_id);
        $product->status = 0;
        $product->save();
        Session::put('message','Hủy Kích Hoạt Sản Phẩm Thành Công');
        return redirect()->back();
    }

    public function process_all(Request $request)
    {
        $list_productID = $request->productID;
        if($list_productID!=null)
        {
            if($request->action == "delete")
            {
                foreach($list_productID as $product_id)
                {
                    $this->getDelete($product_id); 
                }
                Session::put('message','Xóa Sản Phẩm Thành Công');
                return redirect()->back();
            }
            else if($request->action == "active")
            {
                foreach($list_productID as $product_id)
                {
                    $this->active($product_id); 
                }
                Session::put('message','Kích Hoạt Sản Phẩm Thành Công');
                return redirect()->back();
            }
            else if($request->action == "unactive")
            {
                foreach($list_productID as $product_id)
                {
                    $this->unactive($product_id); 
                }
                Session::put('message','Không Kích Hoạt Sản Phẩm Thành Công');
                return redirect()->back();
            }
        }
        return redirect()->back();

    }

    
}
