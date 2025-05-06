<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'product_id',
        'total_price',
        'payment_status',
        'orders_status',
        'payment_method',
        'payment_data',
        'shipping_cost',
        'payment_unique',
        'product_service_id',
        'shipper_id',
        'courier_id',
        'tags',
        'customer_name',
        'customer_phone',
        'customer_address_province',
        'customer_address_district',
        'customer_address_subdistrict',
        'customer_address_village',
        'customer_address_full'
    ];

    public function shipper(){
        return $this->belongsTo(Shippers::class, 'shipper_id');
    }

    public function details(){
        return $this->hasMany(OrderDetails::class, 'order_id');
    }
    
    public function product(){
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function courier(){
        return $this->belongsTo(DeliveryCourier::class, 'courier_id');
    }

    public function service(){
        return $this->belongsTo(ProductServices::class, 'product_service_id');
    }
}
