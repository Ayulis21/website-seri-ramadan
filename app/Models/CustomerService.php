<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerService extends Model
{
    use HasFactory;

    protected $table = 'customer_service';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];

    public function products(){
        return $this->hasMany(Products::class, 'cs_id');
    }
}
