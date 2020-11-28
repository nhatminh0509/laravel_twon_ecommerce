<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps  =false;
    protected $fillable = [
        'name','image','desc','status'
    ] ;
    protected $primaryKey = 'id';
    protected $table = 'tbl_category';
    
    public function product()
    {
        return $this->hasMany('App\Models\Product', 'category_id');
    }
}
