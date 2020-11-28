<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'customer_id','name','address','phone','desc','voucher_id','total_Price','price_Checkout','date_create','status'
    ] ;
    protected $primaryKey = 'id';
    protected $table = 'tbl_bill';


    public function customer()
    {
        return $this->belongsTo('App\Models\Customer','customer_id');
    }

    public function detail_bill()
    {
        return $this->hasMany('App\Models\Detail_Bill','bill_id');
    }

    public function voucher()
    {
        return $this->hasOne('App\Models\Voucher','id','voucher_id');
    }
}
