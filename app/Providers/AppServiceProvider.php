<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Bill;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $all_category = Category::where('status','1')->get();
        $all_brand = Brand::where('status','1')->get();
        View::share('all_category',$all_category);
        View::share('all_brand',$all_brand);

        $count_bill_not_comfirm = Bill::where('status','=',1)->count();
        $take_3_bill_not_comfirm = Bill::where('status','=',1)->orderBy('id','desc')->take(3)->get();
        View::share('count_bill_not_comfirm',$count_bill_not_comfirm);
        View::share('take_3_bill_not_comfirm',$take_3_bill_not_comfirm);
    }
}
