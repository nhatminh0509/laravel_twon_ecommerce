<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = [
        'code','value','quantity','date_start','date_end','status'
    ] ;
    protected $primaryKey = 'id';
    protected $table = 'tbl_voucher';
    public $timestamps = false;
}
