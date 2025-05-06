<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductServices extends Model
{
    use HasFactory;

    protected $table = 'product_services';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'product_id',
        'cost',
        'description'
    ];

    public function product(){
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function order(){
        return $this->hasMany(Orders::class, 'product_service_id');
    }
}
