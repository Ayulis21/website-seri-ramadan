<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'code',
        'category_id',
        'classification_id',
        'cs_id',
        'checkout_url',
        'status',
        'description',
        'payment_transfer',
        'payment_cod',
        'payment_ewallet',
        'payment_transfer_notes',
        'payment_cod_notes',
        'payment_ewallet_notes',
        'normal_price',
        'hpp',
        'variations',
        'stock',
        'region_province',
        'region_district',
        'region_subdistrict'
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategories::class, 'category_id');
    }

    public function classification()
    {
        return $this->belongsTo(ProductClassifications::class, 'classification_id');
    }

    public function customer_service(){
        return $this->belongsTo(CustomerService::class, 'cs_id');
    }

    public function order(){
        return $this->hasMany(Orders::class, 'product_id');
    }

    public function product_variations(){
        return $this->hasMany(ProductVariations::class, 'product_id');
    }

    public function product_services(){
        return $this->hasMany(ProductServices::class, 'product_id');
    }

    public function product_shipping(){
        return $this->hasMany(ProductShipping::class, 'product_id');
    }

    public function insurances(){
        return $this->hasMany(ProductInsurance::class, 'product_id');
    }

    public function media(){
        return $this->hasMany(ProductMedia::class, 'product_id');
    }

    public function landing(){
        return $this->hasMany(LandingPage::class, 'product_id');
    }
}
