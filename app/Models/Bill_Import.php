<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Bill_Import extends Model
{
    protected $fillable = [
        'user_id','supplier_id','total_Price','status'
    ] ;
    protected $primaryKey = 'id';
    protected $table = 'tbl_bill_import';

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier','supplier_id');
    }

    public function detail_bill_import()
    {
        return $this->hasMany('App\Models\Detail_Bill_Import','bill_import_id');
    }
}
