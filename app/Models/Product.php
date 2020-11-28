<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps  =false;
    protected $fillable = [
        'name','category_id','brand_id','image_1','image_2','desc','quantity','in_price','out_price','status'
    ] ;
    protected $primaryKey = 'id';
    protected $table = 'tbl_product';

    public function Brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    public function Category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
