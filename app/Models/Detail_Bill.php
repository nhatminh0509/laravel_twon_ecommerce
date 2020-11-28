<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Detail_Bill extends Model
{
    public $timestamps  =false;
    protected $fillable = [
        'bill_id','product_id','quantity','price'
    ] ;
    protected $primaryKey = 'id';
    protected $table = 'tbl_detail_bill';

    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id');
    }
}
