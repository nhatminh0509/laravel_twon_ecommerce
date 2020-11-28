<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public $timestamps  =false;
    protected $fillable = [
        'name','email','phone','address','status'
    ] ;
    protected $primaryKey = 'id';
    protected $table = 'tbl_supplier';
    
}
