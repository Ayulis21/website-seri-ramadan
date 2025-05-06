<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetails extends Model
{
    use HasFactory;

    protected $table = 'order_details';
    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'product_id',
        'variation_id',
        'qty',
    ];

    // Relasi ke LandingPage (Many-to-One)
    public function order()
    {
        return $this->belongsTo(Orders::class, 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function variation()
    {
        return $this->belongsTo(ProductVariations::class, 'variation_id');
    }
}
