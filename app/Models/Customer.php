<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'name',
        'phone',
        'address',
        'total_Amount',
        'status'
    ];

    protected $table = 'tbl_customer';

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $primaryKey = 'id';
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
