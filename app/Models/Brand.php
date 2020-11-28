<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;
    public $timestamps  =false;
    protected $fillable = [
        'name','image','desc','status'
    ] ;
    protected $primaryKey = 'id';
    protected $table = 'tbl_brand';
    
    public function product()
    {
        return $this->hasMany('App\Models\Product', 'brand_id');
    }
}
