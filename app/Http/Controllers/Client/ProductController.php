<?php

namespace app\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;


class ProductController extends Controller
{
    //
    public function __construct()
    {
 
    }
    
    
    public function getProduct()
    {
        $list_product = Product::where([['status',1],['quantity','>',0]])->paginate(10);
        return view('client.product.index')->with('list_product',$list_product);
    }

    public function getProductByCategory($id_category)
    {
        $category = Category::find($id_category);
        $list_product = $category->product->where('status',1);
        return view('client.product.index')->with('category_name',$category->name)->with('list_product',$list_product);
    }

    public function getProductByBrand($id_brand)
    {
        $brand = Brand::find($id_brand);
        $list_product = $brand->product->where('status',1);
        return view('client.product.index')->with('brand_name',$brand->name)->with('list_product',$list_product);
    }

    public function getDetail($id)
    {
        $product = Product::where([['id',$id],['status',1]])->first();
        return view('client.product.detail')->with('product',$product);
    }

    public function getSearch(Request $request)
    {
        $list_product = Product::where([['name','like','%'.$request->search.'%'],['status',1]])->get();
        return view('client.product.index')->with('searchName',$request->search)->with('list_product',$list_product);
    }

}
