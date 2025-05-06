<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductInsurance extends Model
{
    use HasFactory;

    protected $table = 'product_insurance';
    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'name',
        'description'
    ];

    public function product(){
        return $this->belongsTo(Products::class, 'product_id');
    }
}
