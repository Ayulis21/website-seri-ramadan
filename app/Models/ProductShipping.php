<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductShipping extends Model
{
    use HasFactory;

    protected $table = 'product_shipping';
    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'shipper_id',
        'courier_id',
        'cost',
    ];

    public function product(){
        return $this->belongsTo(Products::class, 'product_id');
    }
    public function shipper(){
        return $this->belongsTo(Shippers::class, 'shipper_id');
    }
    public function courier(){
        return $this->belongsTo(DeliveryCourier::class, 'courier_id');
    }
}
