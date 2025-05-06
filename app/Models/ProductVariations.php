<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariations extends Model
{
    use HasFactory;

    protected $table = 'product_variations';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'status',
        'product_id'
    ];

    // Relasi ke LandingPage (Many-to-One)
    // public function landingPage()
    // {
    //     return $this->belongsTo(LandingPage::class);
    // }

    public function order_details()
    {
        return $this->hasMany(OrderDetails::class, 'variation_id');
    }
}
